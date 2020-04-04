<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start();?>
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
    <!-- sidenav grup info -->
    <div id="grupinfo" class="snav row row-fluid infogroup bgpink bx-shadow-lg" style="visibility: hidden; display: none;">
        <div class="trg-icon float-right mt-12">
            <a onclick="animateCSS('#grupinfo','slideoutleft',function() {$('#grupinfo').removeClass('slideoutleft');closediv('grupinfo')});"><img id="icon-close" class="icon-trigger pointer-cursor" src="img/close.png" alt=""></a>
        </div>
        <div class="position-absolute w-100">
            <div class="col">
                <div class="w-100 mx-auto">
                    <center>
                        <div class="mt-48 mb-20">
                            <img class="icon-profil chat-mb12" src="img/pinkychat.png" alt=""><br>
                            <span class="font-weight-bold fcwhitesmoke fs20">Pinky Chat</span>
                        </div>
                    </center>
                    <div class="mb-12">
                        <?php
                        include('koneksi.php');
                        $sqljum = "SELECT * FROM user";
                        $queryjum = mysqli_query($conn,$sqljum);
                        $data = array();
                        while($rowjum = mysqli_fetch_assoc($queryjum)){
                            if($rowjum['status'] == "online"){
                                $data[] = $rowjum;
                            }
                        }
                        $count = count($data);
                        ?>
                        <span class="fcwhitesmoke">Participant : <span class="font-weight-bold"><?= $count ?> online</span></span>
                    </div>
                    <div class="participant">

                        <?php
                        $sqlmem = "SELECT * FROM user";
                        $quertmem = mysqli_query($conn,$sqlmem);
                        while($row = mysqli_fetch_array($quertmem)){
                        ?>
                        <!-- one status -->
                        <div class="row">
                            <div class="col-3">
                                <img class="circle-img-sts" src="img/p1.jpg" alt="">
                            </div>
                            <div class="col fcwhitesmoke my-auto">
                                <div class="row"><span class="font-weight-bold"><?= $row['nama']?></span></div>
                                <div class="row"><span class="fs12"><?= $row['status'] ?></span></div>
                            </div>
                        </div>
                        <hr>
                        <!-- one status -->
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>   
    </div>
    <!-- sidenav grup info -->
    <!-- menu -->
    <?php include "option.php" ?>
    <!-- menu -->
    <!-- main chat window -->
    <nav class="navbar fixed-top bgpink bx-shadow-md slideindown">
        <a class="navbar-brand pointer-cursor" onclick="opendiv('grupinfo');animateCSS('#grupinfo','slideinleft',function() {$('#grupinfo').removeClass('slideinleft')});">
            <div class="row">
                <div class="col my-auto">
                    <img src="img/pinkychat.png" width="30" height="30" alt="">
                </div>
                <div class="col">
                    <div class="row">
                        <span class="fcwhitesmoke">Pinky Chat</span> 
                    </div>
                    <div class="row">
                        <span class="fs12 fclgrey">Info grup selengkapnya klik disini</span>
                    </div>
                </div>
            </div>
        </a>
        <a class="pointer-cursor" onclick="opendiv('menu-open');animateCSS('#menu-open','slideinright',function() {$('#menu-open').removeClass('slideinright')});""><img class="navbar-brand" src="img/dotmenumini.png" alt=""></a>
    </nav>
    <main class="wchat-minhei bglpink pt72 pb72 plr8">
        <?php
            // echo $_SESSION['nama'];
            // echo $_SESSION['tanggal'];
            $idses = $_SESSION['id'];
            $sql = "SELECT id_chat, chat, HOUR(jam), MINUTE(jam), SECOND(jam),tanggal, id_user FROM chat";
            $query = mysqli_query($conn,$sql);
            while($rowc=mysqli_fetch_array($query))
            {
        ?>
                <?php
                if($rowc['tanggal'] != $_SESSION['tanggal']){
                    if($rowc['id_user'] == $_SESSION['id']){
                    ?>
                        <!-- one popup chat from me -->
                        <div class="row right-pop-chat chat-mb12 mx-auto">
                            <div class="chat-pop chat-me bx-shadow-md">
                                <span class="">
                                    <span class="float-right chat-msg">
                                        <?= $rowc['chat'] ?>
                                    </span>
                                    <br>
                                    <span class="time-snd fcgrey float-right">
                                        <?= $rowc['MINUTE(jam)'] ?> :
                                        <?= $rowc['HOUR(jam)'] ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <!-- one popup chat from me -->
                    <?php } 
                    else 
                    {?>
                        <!-- one popup chat from friends-->
                        <div class="row chat-mb12 mx-auto">
                            <div class="chat-pop chat-frnds bx-shadow-md">
                                <span class="">
                                    <span class="font-weight-bold fcpurple">
                                        <?php $user = $rowc['id_user'];
                                        $sqlin = "SELECT nama FROM user WHERE id_user = $user";
                                        $queryin = mysqli_query($conn,$sqlin);
                                        $data=mysqli_fetch_array($queryin)?>
                                        <?= $data['nama'] ?>
                                    </span>
                                    <br>
                                    <span class="chat-msg">
                                        <?= $rowc['chat'] ?>
                                    </span>
                                    <br>
                                    <span class="time-snd fcgrey float-right">
                                        <?= $rowc['HOUR(jam)'] ?> :
                                        <?= $rowc['MINUTE(jam)'] ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <!-- one popup chat from friends-->
                    <?php }
                } ?>

            <?php } ?>

        <center>
        <div class="chat-mb12 mx-auto">
            <div class="chat-pop fs12 bgpurple fcwhitesmoke bx-shadow-md bgpurple">
                TODAY
            </div>
        </div>
        </center>

        <?php
            // echo $_SESSION['nama'];
            // echo $_SESSION['tanggal'];
            $idses = $_SESSION['id'];
            $sql = "SELECT id_chat, chat, HOUR(jam), MINUTE(jam), SECOND(jam),tanggal, id_user FROM chat";
            $query = mysqli_query($conn,$sql);
            while($rowc=mysqli_fetch_array($query))
            {
        ?>
                <?php
                if($rowc['tanggal'] == $_SESSION['tanggal']){
                    if($rowc['id_user'] == $_SESSION['id']){
                    ?>
                        <!-- one popup chat from me -->
                        <div class="row right-pop-chat chat-mb12 mx-auto">
                            <div class="chat-pop chat-me bx-shadow-md">
                                <span class="">
                                    <span class="float-right chat-msg">
                                        <?= $rowc['chat'] ?>
                                    </span>
                                    <br>
                                    <span class="time-snd fcgrey float-right">
                                        <?= $rowc['MINUTE(jam)'] ?> :
                                        <?= $rowc['HOUR(jam)'] ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <!-- one popup chat from me -->
                    <?php } 
                    else 
                    {?>
                        <!-- one popup chat from friends-->
                        <div class="row chat-mb12 mx-auto">
                            <div class="chat-pop chat-frnds bx-shadow-md">
                                <span class="">
                                    <span class="font-weight-bold fcpurple">
                                        <?php $user = $rowc['id_user'];
                                        $sqlin = "SELECT nama FROM user WHERE id_user = $user";
                                        $queryin = mysqli_query($conn,$sqlin);
                                        $data=mysqli_fetch_array($queryin)?>
                                        <?= $data['nama'] ?>
                                    </span>
                                    <br>
                                    <span class="chat-msg">
                                        <?= $rowc['chat'] ?>
                                    </span>
                                    <br>
                                    <span class="time-snd fcgrey float-right">
                                        <?= $rowc['HOUR(jam)'] ?> :
                                        <?= $rowc['MINUTE(jam)'] ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <!-- one popup chat from friends-->
                    <?php }
                } ?>

            <?php } ?>

        
    </main>
    <form action="proses/proses_chat.php" method="post">
    <footer class="footer navbar fixed-bottom bglpink slideinup">
        <div class="row w-100 mx-auto">
            <div class="col" style="padding-left: 0px; padding-right:8px">
                    <span><input class="stform stform-chat bx-shadow-md" type="text" name="isi" id="" placeholder="Ketik pesan disini"></span>
            </div>
            <!-- <a type="submit" class="btn bgpink btn-circle bx-shadow-md"><img src="img/send.png" width="20px" height="25px" alt=""></a> -->
            <button type="submit" class="btn bgpink btn-circle bx-shadow-md"><img src="img/send.png" width="20px" height="25px" alt=""></button>
        </div>
    </footer>
    </form>
    <!-- main chat window -->
</body>
</html>