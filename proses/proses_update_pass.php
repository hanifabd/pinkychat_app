<?php
    include('koneksi.php');
    session_start();
    $id_ses = $_SESSION['id'];

    $sqlses = "SELECT * from user WHERE id_user = '$id_ses'";
    $queryses = mysqli_query($conn,$sqlses);
    $data = mysqli_fetch_array($queryses);

    $now_pass = $data['password'];

    $id = $_POST['id'];
    $new_pass = $_POST['new_pass'];
    $new_pass_con = $_POST['new_pass_con'];
    $pass_lama = $_POST['pass_lama'];

    if($new_pass == $new_pass_con){
        if($pass_lama == $now_pass){
            $sql = "UPDATE user SET password='$new_pass' WHERE id_user='$id'";
            $query = mysqli_query($conn,$sql);
            
            header("location:../profile.php");
        }
        else{
            echo "gagal 1";
        }
    }
    else{
        echo "gagal";
    }
    

?>