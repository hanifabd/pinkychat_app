<?php

session_start();
include('koneksi.php');

$no_hp = $_POST['no_hp'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE no_hp='$no_hp'";
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query))
{
    if($row['password'] == $password)
    {
        $cek = mysqli_num_rows($query);
        $id = $row['id_user'];
        $nama = $row['nama'];
        // $pass = $row['password'];
    }
}

if($cek > 0)
{
    $_SESSION['id'] = $id;
    $_SESSION['no_hp'] = $no_hp;
    $_SESSION['nama'] = $nama;
    
    $status = "online";
    $sqlstatus = "UPDATE user SET status='$status', tanggal=curdate() WHERE id_user='$id' ";
    $querystatus = mysqli_query($conn,$sqlstatus);

    header("location:update_session_tanggal.php");
}
else
{
    header("location:../login.php?pesan=gagal");
}

?>