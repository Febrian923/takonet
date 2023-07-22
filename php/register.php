<?php
// Koneksi ke database
include 'koneksi.php';
// Mendapatkan data dari formulir register
$Nama = $_POST['Nama'];
$repassword = $_POST['repassword'];
$email = $_POST['Email'];
$password = $_POST['password'];

// Memeriksa apakah username sudah digunakan
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Username sudah digunakan
    echo 'Email sudah terdaftar. Silakan gunakan username lain.';
} else {
    // Menambahkan pengguna baru ke tabel users
    $query = "INSERT INTO users (Nama, repassword, email, password) VALUES ('$Nama','$repassword','$email','$password')";
    if (mysqli_query($conn, $query)) {
        // Registrasi berhasil
        echo 'Registrasi berhasil. Silakan login dengan akun baru.';
        echo '<script>window.location.href = "login.php";</script>';
    } else {
        // Registrasi gagal
        echo 'Registrasi gagal. Silakan coba lagi.';
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>