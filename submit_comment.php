<?php
// Koneksi ke database
include 'koneksi.php';

// Memeriksa apakah data POST terisi
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])) {
    // Mendapatkan data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Menghindari SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $comment = mysqli_real_escape_string($conn, $comment);

    // Menyimpan data ke dalam tabel komentar
    $query = "INSERT INTO tbl_comments (name, email, comment) VALUES ('$name', '$email', '$comment')";
    if (mysqli_query($conn, $query)) {
        // Data berhasil disimpan
        header('Location: index.php'); // Redirect kembali ke halaman utama
        exit();
    } else {
        // Terjadi kesalahan saat menyimpan data
        echo 'Gagal menyimpan komentar. Pesan kesalahan: ' . mysqli_error($conn);
    }
} else {
    // Data POST tidak terisi, mungkin halaman diakses tanpa form submit
    echo "Mohon isi nama, email, dan komentar untuk mengirimkan komentar.";
}

// Menutup koneksi database
mysqli_close($conn);
?>
