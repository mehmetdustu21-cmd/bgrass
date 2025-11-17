<?php
/**
 * @param string 
 * @return string|null 
 */
function getCountryCode(string $ip): ?string
{

    $url = "http://ip-api.com/json/{$ip}?fields=status,countryCode";
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2); 
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $data = json_decode($response, true);
        if ($data && $data['status'] === 'success' && isset($data['countryCode'])) {
            return $data['countryCode'];
        }
    }
    
    return null;
}