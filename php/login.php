<?php
require 'koneksi.php';
$email = $_POST["email"];
$password = $_POSt["password"];

$querysql = "SELECT * FROM tbl_user
            WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("location : index.html");
} else {
    echo "<center><h1>Email atau password anda salah. silahkan coba lagi Login kembali.</h1><button><strong><a href = 'index.html'>login</a></strong></button></center>";
}