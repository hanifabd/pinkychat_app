<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $namedatabase = "chat";

    $conn = mysqli_connect($server,$username,$password,$namedatabase);

    if(!$conn)
    {
        echo "gagal konek!!";
        die();
    }
?>