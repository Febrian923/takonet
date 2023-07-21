<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirim melalui form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validasi data (misalnya: cek apakah password dan konfirmasi password sama)
    if ($password !== $confirmPassword) {
        echo 'Konfirmasi password tidak sesuai';
        exit;
    }

    // Proses penyimpanan data ke database atau langkah-langkah pendaftaran lainnya

    // Contoh: Menyimpan data dalam file CSV
    $data = [
        $name,
        $email,
        $password
    ];
    $file = fopen('data.csv', 'a');
    fputcsv($file, $data);
    fclose($file);

    echo 'Pendaftaran berhasil!';
}
?>