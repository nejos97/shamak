<?php
if(!isset($_GET['idFilm']))
    header('location:films.php');
require_once "script/connexiondb.php";
require_once "class/FilmManager.class.php";
require_once "class/ActeurManager.class.php";
require_once "class/GenreManager.class.php";
require_once "functions/youtube.php";

$FilmManager = New FilmManager($db);
$film = $FilmManager->get($_GET['idFilm']);
if(empty($film->idFilm()))
    header('location:films.php');
$ActeurManager = New ActeurManager($db);
$GenreManager = New GenreManager($db);
$acteurs = $ActeurManager->getByFilm($film->idFilm());
$genres = $GenreManager->getByFilm($film->idFilm());

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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
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
        <style>
        
        .videos {
            padding: 4em 0;
            background: rgba(125, 138, 175, 0.95) url('images/<?php echo $film->imageFilm() ?>');
            background-repeat: no-repeat;
            background-size: cover;
        }
        </style>
        <div class="videos" style=" margin:0px">
            <div class="container">
                <div class="row center black" style="padding:10px">
                    <h4 class="white-text" style="font-weight:700;"><?php echo mb_convert_case($film->titreFilm(), MB_CASE_UPPER, "UTF-8");?></h4>
                </div>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-image">
                                <div class="video-container">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo getYoutubeId($film->lienFilm()) ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="card-content">
                                <b> Title of film : </b> <?php echo $film->titreFilm() ?> <br>
                                <b>Genre : </b><?php foreach ($genres as $genre) {
                                    echo $genre->nomGenre()." ";
                                }
                                ?><br>
                                <b>Date of publication </b> : <?php echo $film->datePubFilm() ?>
                                <li class="divider" style="margin:10px 0px;"></li>
                                <p style="font-weight:10">
                                    <?php echo nl2br($film->resumeFilm()) ?>
                                </p>
                                <li class="divider" style="margin:10px 0px;"></li>
                                <b>Actors : </b><?php $str = ""; foreach ($acteurs as $acteur) {
                                    $str = $str.ucwords($acteur->prenomActeur())." ".strtoupper($acteur->nomActeur()).", ";
                                }
                                $str = substr($str,0,strlen($str)-2);
                                echo $str;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('pages/footer.php'); ?>
    </body>
</html>