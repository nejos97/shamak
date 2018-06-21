<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Welcome to the web site of Shamak Allharamadji</title>

        <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
        <!--Import Google Icon Font-->
        <link href="css/css.css" rel="stylesheet" type="text/css">
        <link href="css/icon.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.css">
        
        <!-- CSS  -->
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
                    <li class="active"><a href="index.php">HOME</a></li>
                    <li><a href="videos.php">VIDEOS</a></li>
                    <li><a href="adversiting.php">ADVERSITING</a></li>
                    <li><a href="films.php">FILMS</a></li>
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li class="active"><a href="index.php">HOME</a></li>
                    <li><a href="videos.php">VIDEOS</a></li>
                    <li><a href="adversiting.php">ADVERSITING</a></li>
                    <li><a href="films.php">FILMS</a></li>
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php" class="h">ABOUT US</a></li>
                    <li><a href="contact.php" class="h">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
        <div class="parallax-container">
            <div class="parallax">
                <img src="images/face copie.png" style="display: block; transform: translate3d(-50%, 195px, 0px);">
            </div>
        </div>
        <div class="newsletter">
            <div class="container">
                <div class="input-field col s6 nleft">
                    <p>Subscribe to our newsletter</p>
                </div>
                <div class="input-field col s6 nright">
                    <form action="#" method="post">
                        <input name="emailNewsLetter" placeholder="Email..." required="" type="email">
                        <button class="btn btn-large waves-effect waves-light" name="newsletter" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="page-footer black">
            <div class="row">
                <div class="col l3 s12">
                    <h5 class="white-text">ABOUT</h5>
                    <p class="grey-text text-darken-1 thin">
                        This is and official site of shamak allharamadji
                    </p>
                    <div class="test">
                        <a href=""><li class="fa fa-facebook"></li></a> 
                        <a href=""><li class="fa fa-twitter"></li></a> 
                        <a href=""><li class="fa fa-linkedin"></li></a> 
                        <a href=""><li class="fa fa-instagram"></li></a>
                    </div>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">HELP</h5>
                    <ul>
                        <li><a class="grey-text text-darken-1" href="about.php">ABOUT US</a></li>
                        <li><a class="grey-text text-darken-1" href="contact.php">CONTACT US</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">LINKS</h5>
                    <ul>
                        <li><a class="grey-text text-darken-1" href="videos.php">VIDEOS</a></li>
                        <li><a class="grey-text text-darken-1" href="adversiting.php">ADVERSITING</a></li>
                        <li><a class="grey-text text-darken-1" href="films.php">FILMS</a></li>
                        <li><a class="grey-text text-darken-1" href="ourteam.php">OUR TEAM</a></li>
                    </ul>
                </div>
                
                <div class="col l3 s12">
                    <h5 class="white-text">CONTACT</h5>
                    <p class="grey-text text-darken-1">Adress,<br>Yaounde Cameroun</p>
                    <ul>
                        <li><a class="grey-text text-darken-1" href="tel://+237690327402">+237 690 327 402</a></li>
                        <li><a class="grey-text text-darken-1" href="mailto:email@email.com">email@email.com</a></li>
                        <li><a class="grey-text text-darken-1" href="monsitte.com">monsite.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container white-text">
                Copyright ©2018 All rights reserved - Made with <i class="fa fa-heart pink-text"></i> by <a class="blue-text text-lighten-1" href="mailto:alladintroumba@gmail.com">#l@d!n$t@r#</a>
                </div>
            </div>
        </footer>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/init.js"></script>
        <script>
        $(document).ready(function(){
            $('.slider').slider();
        });
        </script>
        <script src="js/js.js"></script>
        <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;">
            <i class="fa fa-angle-up"></i>
        </a>
    </body>
</html>