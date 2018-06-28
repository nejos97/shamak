<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Our Team - Shamak Allharamadji</title>

        <link href="images/favicon.svg" rel="shortcut icon" type="image/x-icon">
        <link href="css/css.css" rel="stylesheet" type="text/css">
        <link href="css/icon.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style>
        .parallax-container {
            min-height: 380px;
            line-height: 0;
            height: auto;
            color: rgba(255,255,255,.9);
        }
        .parallax-container .section {
            width: 100%;
        }
        .row.team{
            padding:300px 20px 300px 20px;
            background-image:url("images/face copie.png");
        }
        </style>
    </head>
    <body>
        <div class="row black white-text haut" style="margin-bottom:0px;" align="center">
            <div align="center">
                <h5>DIRECTOR</h5>
                <h4>SHAMAK ALLHARAMADJI</h4>
            </div>
        </div>
        <nav class="nav-extended grey darken-1">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Shamak</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="videos.php">VIDEOS</a></li>
                    <li><a href="adversiting.php">ADVERSITING</a></li>
                    <li><a href="films.php">FILMS</a></li>
                    <li class="active"><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="videos.php">VIDEOS</a></li>
                    <li><a href="adversiting.php">ADVERSITING</a></li>
                    <li><a href="films.php">FILMS</a></li>
                    <li class="active"><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php" class="h">ABOUT US</a></li>
                    <li><a href="contact.php" class="h">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
        <div class="row team">
            <h5 class="header center white-text text-lighten-2">MY TEAM</h5>
        </div>
        <div class="carousel">
            <a class="carousel-item" href="#one!">
                <img src="images/fond2.jpg">
            </a>
            <a class="carousel-item" href="#two!"><img src="images/fond2.jpg"></a>
            <a class="carousel-item" href="#three!"><img src="images/fond2.jpg"></a>
            <a class="carousel-item" href="#four!"><img src="images/fond2.jpg"></a>
            <a class="carousel-item" href="#five!"><img src="images/fond2.jpg"></a>
        </div>
        <?php include('pages/footer.php'); ?>
    </body>
</html>