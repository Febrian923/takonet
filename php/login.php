<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirim melalui form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Proses validasi data login
    // Misalnya, cek apakah email dan password sesuai dengan data yang ada dalam database

    // Contoh: Membaca data dari file CSV
    $file = fopen('data.csv', 'r');
    while (($row = fgetcsv($file)) !== false) {
        $savedEmail = $row[1];
        $savedPassword = $row[2];
        if ($savedEmail === $email && $savedPassword === $password) {
            echo 'Login berhasil!';
            fclose($file);
            exit;
        }
    }
    fclose($file);

    echo 'Email atau password salah.';
}
?>