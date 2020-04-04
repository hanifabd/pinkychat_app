<?php
    include('koneksi.php');
    session_start();

    $isi = $_POST['isi'];
    $id = $_SESSION['id'];

    $sql = "INSERT INTO chat (chat,jam,tanggal,id_user) VALUES ('$isi',now(),curdate(),'$id')";
    $query = mysqli_query($conn,$sql);

    if($query)
    {
        echo "berhasil disimpan";
        header('location:../chat-room.php');
    }
    else
    {
        echo "gagal";
    }

?>