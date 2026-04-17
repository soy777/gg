<?php

$url = "https://raw.githubusercontent.com/soy777/gg/main/rznew.html";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$konten = curl_exec($ch);

curl_close($ch);

if ($konten === false) {

    die("Gagal mengambil konten.");

}

echo $konten;

?>
