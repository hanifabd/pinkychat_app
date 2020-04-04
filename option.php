<!-- menu -->
<div id="menu-open" class="snav row row-fluid menu-info bgpink bx-shadow-lg" style="visibility: hidden; display: none;">
    <div class="trg-icon float-right mt-12">
        <a onclick="animateCSS('#menu-open','slideoutright',function() {$('#menu-open').removeClass('slideoutright');closediv('menu-open')});"><img class="icon-trigger pointer-cursor" src="img/close.png" alt=""></a>
    </div>
    <div class="position-absolute w-100">
        <div class="col">
            <div class="w-100 mx-auto">
                <div class="participant mt-72">
                    <div align="center">
                        <a class="fs48 menu-ls fcwhitesmoke" onclick="animateCSS('#menu-open','slideoutright',function() {$('#menu-open').removeClass('slideoutright');closediv('menu-open')});" href="chat-room.php">Chat Room</a><br>
                        <a class="fs48 menu-ls fcwhitesmoke" href="profile.php">Profile</a><br>
                        <a id="full" class="fs48 menu-ls fcwhitesmoke" onclick="toggleFullscreen()" href="#" >Fullscreen Mode</a><br>
                        <a class="fs48 menu-ls fcwhitesmoke" href="proses/proses_logout.php">Sign Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<!-- menu -->