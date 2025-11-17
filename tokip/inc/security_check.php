<?php
/**
 * IP Adresi Güvenlik Protokolü (@fastfrancis | 2025)
 *
 * @param string $ip Kontrol edilecek IP adresi.
 * @param string $apiKey proxycheck.io'dan alınan API anahtarı.
 * @param \DeviceDetector\Cache\CacheInterface $cache Cache nesnesi.
 * @return array Sonuçları içeren bir dizi döndürür.
 */

function checkIpSecurity(string $ip, string $apiKey, \DeviceDetector\Cache\CacheInterface $cache): array
{
    $result = ['is_proxy' => false, 'error' => null];
    $cacheKey = 'proxycheck_limit_reached';

    if ($cache->contains($cacheKey)) {
        $result['error'] = 'API_LIMIT_REACHED_CACHE'; 
        return $result;
    }

    $apiUrl = "http://proxycheck.io/v2/{$ip}?key={$apiKey}&vpn=1";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3); 
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $result['error'] = 'cURL Hatasi: ' . curl_error($ch);
        curl_close($ch);
        return $result;
    }
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['status']) && $data['status'] === 'error') {
        if (strpos(strtolower($data['message']), 'limit') !== false) {
            $result['error'] = 'API_LIMIT_REACHED';
            $secondsUntilMidnight = strtotime('tomorrow') - time();
            $cache->save($cacheKey, true, $secondsUntilMidnight);
        } else {
            $result['error'] = 'API Hatasi: ' . $data['message'];
        }
        return $result;
    }
    
    if (!isset($data[$ip])) {
        $result['error'] = 'API Cevabi Anlasilamadi';
        return $result;
    }

    $ipInfo = $data[$ip];
    if (isset($ipInfo['proxy']) && $ipInfo['proxy'] === 'yes') {
        $result['is_proxy'] = true;
        $result['type'] = $ipInfo['type'] ?? 'Proxy/VPN';
    }

    return $result;
}