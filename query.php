<?php

error_reporting(0);

$ip = '0.0.0.0';
$queryport = 27015;

$socket = @fsockopen("udp://".$ip, $queryport , $errno, $errstr, 1);
stream_set_timeout($socket, 2);	
fwrite($socket, "\xFF\xFF\xFF\xFF\x54Source Engine Query\x00");
$response = fread($socket, 4096);
fclose($socket);

$packet = explode("\x00", substr($response, 6), 5);

print "<pre>";
print_r($packet);
print "</pre>";

?>
