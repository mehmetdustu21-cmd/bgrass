<?php
header('Content-Type: application/json');

function fetchAndCacheFilteredUrls($cacheDuration = 15 * 60)
{
    try {
        $cacheFile = __DIR__ . '/cache.json';

        if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheDuration)) {
            $cacheData = json_decode(file_get_contents($cacheFile), true);
            return $cacheData['urls'] ?? [];
        }

        $now = new DateTime();
        $tenHoursAgo = (new DateTime())->modify('-10 hours');

        $dateGte = $tenHoursAgo->format('Y-m-d\TH:i:s');
        $dateLte = $now->format('Y-m-d\TH:i:s');

        $urls = [];

        $fetch = function ($desc) use ($dateGte, $dateLte) {
            $url = "https://api.codetabs.com/v1/proxy?quest=https://www.usom.gov.tr/api/address/index?type=domain&desc={$desc}&date_gte={$dateGte}&date_lte={$dateLte}&page=0";
            $context = stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'header' => [
                        'User-Agent: Mozilla/5.0'
                    ]
                ]
            ]);
            $response = file_get_contents($url, false, $context);
            if (!$response) return [];
            $data = json_decode($response, true);
            if (!isset($data['models'])) return [];
            return array_column($data['models'], 'url');
        };

        $urls = array_merge($fetch('BP'), $fetch('PH'));

        file_put_contents($cacheFile, json_encode([
            'created_at' => date('Y-m-d H:i:s'),
            'urls' => $urls
        ]));

        return $urls;
    } catch (Exception $e) {
        error_log(date('[Y-m-d H:i:s] ') . $e->getMessage() . "\n", 3, __DIR__ . '/error.txt');
        return [];
    }
}

$urls = fetchAndCacheFilteredUrls();
echo json_encode($urls);
?>