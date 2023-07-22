<?php
require 'koneksi.php';
$Email = $_POST["email"];
$Password = $_POSt["password"];

$querysql = "SELECT * FROM tbl_user
            WHERE email = '$Email' AND password = '$Password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("location : index.html");
} else {
    echo "<center><h1>Email atau password anda salah. silahkan coba lagi Login kembali.</h1><button><strong><a href = 'index.html'>login</a></strong></button></center>";
}