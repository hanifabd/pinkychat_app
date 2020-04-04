<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- bootstrap css -->

    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/trigger.js"></script>
    <script>
        function toggleFullscreen(elem) {
            elem = elem || document.documentElement;
            if (!document.fullscreenElement && !document.mozFullScreenElement &&
                !document.webkitFullscreenElement && !document.msFullscreenElement) {
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.msRequestFullscreen) {
                        elem.msRequestFullscreen();
                    } else if (elem.mozRequestFullScreen) {
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullscreen) {
                        elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
        }      
    </script>
    <!-- bootstrap js -->
    <title>Pinky Chat</title>
</head>
<body>
    <!-- menu -->
    <?php include "option.php" ?>
    <!-- menu -->
    <!-- main chat window -->
    <nav class="navbar fixed-top bgpink bx-shadow-md pd16 slideindown">
        <div class="navbar-brand">
            <div class="row">
                <a href="chat-room.php">
                <div class="col my-auto">
                    <img src="img/Asseackt 3.png" height="20" alt="">
                </div>
                </a>
                <div class="col">
                    <span class="fcwhitesmoke">Profile</span>                     
                </div>
            </div>
        </div>
        <a class="pointer-cursor" onclick="opendiv('menu-open');animateCSS('#menu-open','slideinright',function() {$('#menu-open').removeClass('slideinright')});""><img class="navbar-brand" src="img/dotmenumini.png" alt=""></a>
    </nav>
    <?php 
    include('koneksi.php');
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM user WHERE id_user = $id";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($query);
    ?>
    <main class="wchat-minhei bglpink pt72 pb72 plr8">
        <center>
            <div class="mt-36">
                <img class="circle-img-profile" src="img/p1.jpg" alt="">
            </div>
            <div>
                <form action="proses/proses_update_pass.php" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id_user']?>">
                    <input class="stform stform-login bx-shadow-md bgwhitesmoke mt-36 fcpurple" type="text" name="" id="" placeholder="Username" value="<?= $data['nama'] ?>"><br>
                    <input class="stform stform-login bx-shadow-md bgwhitesmoke fcpurple mt-24" type="password" name="new_pass" id="" placeholder="New Password"><br>
                    <input class="stform stform-login bx-shadow-md bgwhitesmoke fcpurple mt-24" type="password" name="new_pass_con" id="" placeholder="Confirm Password"><br>
                    <br>
                    <Span class="fcpurple font-weight-bold">Confirm Change</Span><br>
                    <input class="stform stform-login bx-shadow-md bgwhitesmoke fcpurple mt-24" type="password" name="pass_lama" id="" placeholder="Password"><br>
                    <input class="button-main-act mt-48 bgpink fcwhitesmoke bx-shadow-lg" type="submit" value="Edit Profile">
                </form>
            </div>
        </center>
    </main>
</body>
</html>