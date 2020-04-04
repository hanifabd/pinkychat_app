<?php
include('koneksi.php');

$no = $_POST['no'];
$nama = $_POST['nama'];
$pass = $_POST['pass'];
$pass1 = $_POST['pass1'];
$status = "offline";

if($pass == $pass1)
{
    $sql = "INSERT INTO user (nama,no_hp,password,status) VALUES ('$nama','$no','$pass','$status')";
    $query = mysqli_query($conn,$sql);

    if($query)
    {
        echo "berhasil disimpan";
        header('location:../login.php');
    }
    else
    {
        echo "gagal";
    }
}
else
{
    header('location:../register.php');
}

?>