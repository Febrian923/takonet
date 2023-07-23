<?php
// Koneksi ke database
include 'koneksi.php';

// Mengambil data komentar dari database
$query = "SELECT * FROM tbl_comments ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Menampilkan data komentar
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<p>';
        echo 'Nama: ' . $row['name'] . '<br>';
        echo 'Email: ' . $row['email'] . '<br>';
        echo 'Komentar: ' . $row['comment'] . '<br>';
        echo '</p>';
    }
} else {
    echo '<p>Belum ada komentar.</p>';
}

// Menutup koneksi database
mysqli_close($conn);
?>
