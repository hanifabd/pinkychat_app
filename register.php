<!DOCTYPE html>
<html lang="en">
<head>
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
    <!-- bootstrap js -->
    <title>Pinky Chat - Sign Up</title>
</head>
<body>
    <div id="login" class="row row-fluid bgpink fadein">
        <div class="pd54">
            <div class="fs60 fadeindown-d3">
                <span class="fcblack">Hi!</span><span class="fcwhitesmoke"> Let's Join With Us</span>
            </div>
            <div class="mt-5">
                <form action="proses/proses_register.php" method="post">
                    <!-- input -->
                    <input class="stform stform-login bx-shadow-md bglpink fcpurple fadeinleftbig" type="text" name="no" id="" placeholder="Phone Number"><br>
                    <input class="stform stform-login bx-shadow-md bglpink fcpurple mt-24 fadeinleftbig" type="text" name="nama" id="" placeholder="Username"><br>
                    <input class="stform stform-login bx-shadow-md bglpink fcpurple mt-24 fadeinleftbig" type="password" name="pass" id="" placeholder="Password"><br>
                    <input class="stform stform-login bx-shadow-md bglpink fcpurple mt-24 fadeinleftbig" type="password" name="pass1" id="" placeholder="Password"><br>
                    <!-- input -->
                    <!-- button -->
                    <input class="button-main-act mt-48 bgwhitesmoke fcpurple bx-shadow-lg" type="submit" value="Sign Up">
                    <a href="login.php" class="button-opt mt-48 bglpink fcwhitesmoke bx-shadow-lg ml-2">Sign In</a>
                    <!-- button -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>