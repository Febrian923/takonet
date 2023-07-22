<?php
include 'koneksi.php';
$Email = $_POST["Email"];
$Password = $_POST["Password"];

$query_sql = "SELECT * FROM tbl_user
            WHERE Email = '$Email' AND Password = '$Password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("Location : index.html");
} else {
    echo "<center><h1>Email atau password anda salah. silahkan coba lagi Login kembali.</h1><button><strong><a href = 'index.html'>login</a></strong></button></center>";
}