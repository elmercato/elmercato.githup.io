<?php
// تسجيل البيانات
$log = "IP: " . $_GET['ip'] . " | Agent: " . $_GET['userAgent'] . " | Time: " . $_GET['time'] . "\n";

// حفظ البيانات في ملف
file_put_contents("logs.txt", $log, FILE_APPEND);

// Redirect to Facebook أو أي مكان تحب
header("Location: https://www.facebook.com/elmercato0");
exit;
?>
