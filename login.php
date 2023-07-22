<?php

include 'koneksi.php';
// Melakukan koneksi ke database
$Email = $_POST['Email'];
$Password = $_POST['Password'];

$koneksi = mysqli_connect( $Password, $Email);

// Memeriksa apakah koneksi berhasil
if (mysqli_connect_errno()) {
    echo "Koneksi ke database gagal: " . mysqli_connect_error();
    exit();
}

// Fungsi untuk melakukan login
function login($Email, $Password, $koneksi) {
    // Menghindari SQL injection
    $username = mysqli_real_escape_string($koneksi, $Email);
    $password = mysqli_real_escape_string($koneksi, $Password);

    // Membuat query untuk mencari pengguna berdasarkan email
    $query = "SELECT * FROM tbl_user WHERE Email = '$Email'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Memeriksa apakah username ditemukan
        if (mysqli_num_rows($result) === 1) {
            $user_data = mysqli_fetch_assoc($result);
            $hashed_password = $user_data['Password'];

            // Memeriksa apakah password yang dimasukkan cocok dengan yang di database
            if (password_verify($Password, $hashed_password)) {
                // Login berhasil
                return true;
            }
        }
    }

    // Jika username atau password salah, atau query gagal, login gagal
    return false;
}

// Contoh penggunaan fungsi login
$Email = $_POST['Email'];
$Password = $_POST['Password'];

if (login($Email, $Password, $koneksi)) {
    echo "Login berhasil!";
    // Lakukan tindakan setelah login sukses, seperti mengarahkan ke halaman utama
} else {
    echo "Login gagal. Silakan cek kembali username dan password Anda.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
