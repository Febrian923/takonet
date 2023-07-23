<?php

include 'koneksi.php';
// Melakukan koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_takonet';



$koneksi = mysqli_connect($host, $username, $password, $database);
if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

// Memeriksa apakah koneksi berhasil
if (mysqli_connect_errno()) {
    echo "Koneksi ke database gagal: " . mysqli_connect_error();
    exit();
}

// Memeriksa apakah data POST terisi
if (isset($_POST['Email']) && isset($_POST['Password'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // Menghindari SQL injection
    $Email = mysqli_real_escape_string($koneksi, $Email);
    $Password = mysqli_real_escape_string($koneksi, $Password);

    // Membuat query untuk mencari pengguna berdasarkan email
    $query = "SELECT * FROM tbl_user WHERE Email = '$Email'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Memeriksa apakah email ditemukan
        if (mysqli_num_rows($result) === 1) {
            $user_data = mysqli_fetch_assoc($result);
            $hashed_password = $user_data['Password'];

            // Memeriksa apakah password yang dimasukkan cocok dengan yang di database
            if (password_verify($Password, $hashed_password)) {
                //Login berhasil
                echo "Login berhasil!";
                // Lakukan tindakan setelah login sukses, seperti mengarahkan ke halaman utama
                echo '<script>window.location.href = "Admin.html";</script>';
                exit();
            }
        }
    }
  
    // Jika email atau password salah, atau query gagal, login gagal
    echo "Login gagal. Silakan cek kembali email dan password Anda.";
} else {
    // Data POST tidak terisi, mungkin halaman diakses tanpa form submit
    echo "Mohon isi email dan password untuk login.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
