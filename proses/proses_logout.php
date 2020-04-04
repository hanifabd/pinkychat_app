<?php
session_start();

$id = $_SESSION['id'];

session_destroy();

include('koneksi.php');
$status = "offline";
$sqlstatus = "UPDATE user SET status='$status' WHERE id_user='$id' ";
$querystatus = mysqli_query($conn,$sqlstatus);

header('location:../login.php?pesan=log-out');
?>