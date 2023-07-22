<?php
require 'koneksi.php';
$Nama = $_post["nama"];
$Email = $_post["email"];
$Password = $_post["password"];
$repassword = $_post["repassword"];

$query_sql = "INSERT INTO tbl_user (nama, email, password, repassword)
            VALUES ('$nama', '$email', '$password', '$repassword')";

if(mysqli_query($conn, $query_sql)) {
    header("location : login.html");
} else{
    echo "pendaftaran gagal : " . mysqli_error($conn);
}
