<?php
require_once "class/FilmManager.class.php";
require_once "class/ActeurManager.class.php";
require_once "class/GenreManager.class.php";
require_once "script/connexiondb.php";
require_once "functions/youtube.php";

// $acteur[] = New Acteur(array("nomActeur"=>"avaïka troumba","prenomActeur"=>"alladin"));
// $acteur[] = New Acteur(array("nomActeur"=>"nenba","prenomActeur"=>"jonathan"));
// $acteur[] = New Acteur(array("nomActeur"=>"sonkeng donfack","prenomActeur"=>"maldini gaston"));
// $acteur[] = New Acteur(array("nomActeur"=>"kabirou","prenomActeur"=>"tizi"));
// $acteur[] = New Acteur(array("nomActeur"=>"hybrahyma","prenomActeur"=>"yaya"));
// $acteur[] = New Acteur(array("nomActeur"=>"mansour","prenomActeur"=>"issa"));
// $acteur[] = New Acteur(array("nomActeur"=>"haiwang","prenomActeur"=>"serge"));
// $ActeurManager = New ActeurManager($db);
// $ActeurManager->add($acteur[6]);
// 
// $genre[] = New Genre(array("nomGenre"=>"action"));
// $genre[] = New Genre(array("nomGenre"=>"romantique"));
// $genre[] = New Genre(array("nomGenre"=>"science-fiction"));
// $genre[] = New Genre(array("nomGenre"=>"comédie"));
// $genre[] = New Genre(array("nomGenre"=>"horreur"));
// $genre[] = New Genre(array("nomGenre"=>"guerre"));
// $genre[] = New Genre(array("nomGenre"=>"histoire"));
// $genre[] = New Genre(array("nomGenre"=>"policier"));
// $genre[] = New Genre(array("nomGenre"=>"aventure"));
// $genre[] = New Genre(array("nomGenre"=>"drame"));
// $GenreManager = New GenreManager($db);
// $GenreManager->add($genre[9]);

// $film = New Film(array("titreFilm" => "Black Panter","datePubFilm"=>"2017/09/24","imageFilm"=>"parallax1.png","lienFilm"=>"https://www.youtube.com/watch?v=fC6YV65JJ6g","resumeFilm"=>"Ce film parle de black panter Wakanda"));
// 
// $acteurs[] = 1;
// $acteurs[] = 4;
// $acteurs[] = 6;
// $acteurs[] = 3;

// $genres[] = 3;
// $genres[] = 1;

// $FilmManager->add($film,$genres,$acteurs);
$FilmManager = New FilmManager($db);
$films = $FilmManager->getlist();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Films - Shamak Allharamadji</title>

        <link href="images/favicon.svg" rel="shortcut icon" type="image/x-icon">
        <link href="css/css.css" rel="stylesheet" type="text/css">
        <link href="css/icon.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style>
            .modal .modal-content {
                padding: 0;
            }
            .modal{
                background-color:transparent;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .parallax-container {
                height: 300px;
            }
            .parallax-container .section {
                width: 100%;
            }
            .parallax-container {
                line-height: 0;
                color: rgba(255,255,255,.9);
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
                    <li class="active"><a href="films.php">FILMS</a></li>
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="videos.php">VIDEOS</a></li>
                    <li><a href="adversiting.php">ADVERSITING</a></li>
                    <li class="active"><a href="films.php">FILMS</a></li>
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php" class="h">ABOUT US</a></li>
                    <li><a href="contact.php" class="h">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
        <?php
        $i=0;
        foreach ($films as $film) {
            # code...
            $i++;
        ?>  
            <a href="#modal<?php echo $i; ?>" class="modal-trigger">
                <div class="parallax-container valign-wrapper">
                    <div class="section no-pad-bot black-text">
                        <div class="container">
                            <div class="row center">
                                <h5 class="header col s12 light"><?php echo $film->titreFilm(); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="parallax">
                            <img src="images/<?php echo $film->imageFilm(); ?>">
                    </div>
                </div>
            </a>
            <!-- Modal Structure -->
            <div id="modal<?php echo $i; ?>" class="modal">
                <div class="modal-content">
                    <div class="video-container">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo getYoutubeId($film->lienFilm()) ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <?php include('pages/footer.php'); ?>
    </body>
</html>