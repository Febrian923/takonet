<?php
// Koneksi ke database
include 'koneksi.php';

// Mendapatkan data dari formulir register
$Nama = $_POST['Nama'];
$repassword = $_POST['repassword'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];

// Memeriksa apakah username sudah digunakan
$query = "SELECT * FROM tbl_user WHERE Email = '$Email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Username sudah digunakan
    echo 'Email sudah terdaftar. Silakan gunakan username lain.';
} else {
    // Hash password sebelum disimpan di database
    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    // Menambahkan pengguna baru ke tabel users
    $query = "INSERT INTO tbl_user (Nama, repassword, Email, Password) VALUES ('$Nama','$repassword','$Email','$hashed_password')";
    if (mysqli_query($conn, $query)) {
        // Registrasi berhasil
        echo 'Registrasi berhasil. Silakan login dengan akun baru.';
        echo '<script>window.location.href = "Login.html";</script>';
    } else {
        // Registrasi gagal
        echo 'Registrasi gagal. Silakan coba lagi.';
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>
