<?php
error_reporting(0);

// Ambil semua file ZIP di folder ini
$files = glob(__DIR__ . "/*.zip");

if (empty($files)) {
    die("Tidak ada file ZIP di folder ini.");
}

if (!extension_loaded('zip')) {
    die("Ekstensi ZIP PHP tidak tersedia.");
}

foreach ($files as $zip_file) {
    $folder_name = basename($zip_file, ".zip"); // Buat folder sesuai nama file ZIP
    $extract_to = __DIR__ . "/" . $folder_name;

    $zip = new ZipArchive;
    if ($zip->open($zip_file) === TRUE) {
        $zip->extractTo($extract_to);
        $zip->close();
        echo "ZIP '{$zip_file}' berhasil diekstrak ke folder '{$extract_to}'<br>";
    } else {
        echo "Gagal membuka ZIP: {$zip_file}<br>";
    }
}
?>
