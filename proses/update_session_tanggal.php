<?php
include('koneksi.php');
session_start();
$id = $_SESSION['id'];

// $sql = "SELECT YEAR(tanggal), MONTH(tanggal), DAY(tanggal) from user WHERE id_user = '$id'";
$sql = "SELECT tanggal from user WHERE id_user = '$id'";
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
    $tanggal = $row['tanggal'];
    // $tahun = $row['YEAR(tanggal)'];
    // $bulan = $row['MONTH(tanggal)'];
    // $hari = $row['DAY(tanggal)'];
}

$_SESSION['tanggal'] = $tanggal;
// $_SESSION['year'] = $tahun;
// $_SESSION['month'] = $bulan;
// $_SESSION['day'] = $hari;
header("location:../chat-room.php");
?>