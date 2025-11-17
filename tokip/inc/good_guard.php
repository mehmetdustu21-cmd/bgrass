<?php
/**
 * GoodGuard - Akıllı Güvenlik Kalkanı (Tüm Kontroller Dahil)
 * Kontrol Sırası: 1. IP Kara Liste -> 2. Bot -> 3. Ülke -> 4. Proxy/VPN
 */

declare(strict_types=1);

$autoloader = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloader)) { exit('Sistemde bir yapılandırma hatası mevcut.'); }
require_once $autoloader;

require_once(__DIR__ . '/blacklist_check.php'); 
require_once(__DIR__ . '/security_check.php');   
require_once(__DIR__ . '/country_check.php');    

use DeviceDetector\DeviceDetector;
use DeviceDetector\Cache\CacheInterface;

class SimpleFileCache implements CacheInterface
{
    private $cacheDir;

    public function __construct(string $cacheDir)
    {
        $this->cacheDir = rtrim($cacheDir, '/') . '/';
        if (!is_dir($this->cacheDir)) {
            @mkdir($this->cacheDir, 0775, true);
        }
    }

    private function getCacheFile(string $id): string
    {
        $safeId = preg_replace('/[^a-zA-Z0-9_\-.]/', '_', $id);
        return $this->cacheDir . 'ddcache_' . $safeId . '.php';
    }

    public function fetch(string $id)
    {
        $file = $this->getCacheFile($id);
        if (!file_exists($file) || !is_readable($file)) {
            return null;
        }
        return include $file;
    }

    public function contains(string $id): bool
    {
        return file_exists($this->getCacheFile($id));
    }

    public function save(string $id, $data, int $lifeTime = 0): bool
    {
        $file = $this->getCacheFile($id);
        $content = '<?php return ' . var_export($data, true) . ';';
        return file_put_contents($file, $content) !== false;
    }

    public function delete(string $id): bool
    {
        $file = $this->getCacheFile($id);
        if (file_exists($file)) {
            return unlink($file);
        }
        return false;
    }

    public function flushAll(): bool
    {
        return true;
    }
}

function get_ip_address(): string 
{
    if (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];

        if (in_array($ip, ['127.0.0.1', '::1'])) {
            return $ip;
        }
    }

    $headers = ['HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP', 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED'];
    foreach ($headers as $key){
        if (array_key_exists($key, $_SERVER) === true){
            $ip = trim(explode(',', $_SERVER[$key])[0]);
            
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                return $ip;
            }
        }
    }

    if (isset($_SERVER['REMOTE_ADDR']) && filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) {
        return $_SERVER['REMOTE_ADDR'];
    }

    return 'UNKNOWN';
}

try {
    $visitorIp = get_ip_address();

    if ($visitorIp !== 'UNKNOWN') {
       $ipBlocker = new IpBlockList(__DIR__ . '/blacklist.dat');
        
        if ($ipBlocker->isBlocked($visitorIp)) {
            header('HTTP/1.0 403 Forbidden');
            exit('Erişim Engellendi (IP Kara Listede).');
        }
    }

    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    $dd = new DeviceDetector($userAgent);
    $cacheDir = __DIR__ . '/../cache';
    $cache = new SimpleFileCache($cacheDir);
    $dd->setCache($cache);
    $dd->parse();

    if ($dd->isBot()) {
        header('HTTP/1.0 403 Forbidden');
        exit('Erişim Engellendi (Bot).');
    }

} catch (\Throwable $e) {
    error_log('good_guard.php KRİTİK HATA: ' . $e->getMessage() . ' Satır: ' . $e->getLine());
    http_response_code(503);
    exit('Güvenlik sistemi geçici olarak devre dışı.');
}
?>