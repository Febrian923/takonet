<?php
// Koneksi ke database
include 'koneksi.php';

// Memeriksa apakah data POST terisi
if (isset($_POST['video_url']) && isset($_POST['deskripsi']) && isset($_POST['Email'])) {
    // Mendapatkan data dari formulir
    $video_url = $_POST['video_url'];
    $deskripsi = $_POST['deskripsi'];
    $Email = $_POST['Email'];

    // Menghindari SQL injection
    $video_url = mysqli_real_escape_string($conn, $video_url);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $Email = mysqli_real_escape_string($conn, $Email);

    // Menyimpan data ke dalam tabel video
    $query = "INSERT INTO tbl_video (video_url, deskripsi, Email) VALUES ('$video_url', '$deskripsi', '$Email')";
    if (mysqli_query($conn, $query)) {
        // Data berhasil disimpan
        echo 'Video berhasil diunggah.';
        echo '<script>window.location.href = "index.html";</script>';
                exit();
            }
} else {
    // Data POST tidak terisi, mungkin halaman diakses tanpa form submit
    echo "Mohon isi URL video dan deskripsi untuk mengunggah video.";
}

// Menutup koneksi database
mysqli_close($conn);
?>
