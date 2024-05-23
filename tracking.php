<?php
$logfile = 'log.txt';
$log = fopen($logfile, 'a');
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$date = date('Y-m-d H:i:s');
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$location = "{$details->city}, {$details->region}, {$details->country}";
fwrite($log, "IP: $ip - Date: $date - User-Agent: $userAgent - Location: $location\n");
fclose($log);
header('Content-Type: image/png');
readfile('pixel.png');
?>
