<?php
require_once "class/PubliciteManager.class.php";
require_once "class/EntrepriseManager.class.php";
require_once "script/connexiondb.php";
require_once "functions/youtube.php";

// $entreprise[] = New Entreprise(array("nomEntreprise"=>"MTN"));
// $entreprise[] = New Entreprise(array("nomEntreprise"=>"Orange"));
// $entreprise[] = New Entreprise(array("nomEntreprise"=>"Nexttel"));
$EntrepriseManager = New EntrepriseManager($db);
// $EntrepriseManager->add($entreprise[0]);
// $EntrepriseManager->add($entreprise[1]);
// $EntrepriseManager->add($entreprise[2]);
// $EntrepriseManager->add($entreprise[3]);
// $EntrepriseManager->add($entreprise[4]);

// $publicite = New Publicite(array("titrePublicite" => "Connectez-vous facilement avec Orange","datePubPublicite"=>"2017/09/25","imagePublicite"=>"fond2.jpg","lienPublicite"=>"https://www.youtube.com/watch?v=fC6YV65JJ6g","resumePublicite"=>"rien"));


$PubliciteManager = New PubliciteManager($db);
// $PubliciteManager->add($publicite,2);
$publicites = $PubliciteManager->getlist();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Adversitings - Shamak Allharamadji</title>

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
                    <li class="active"><a href="adversiting.php">ADVERSITING</a></li>
                    <li><a href="films.php">FILMS</a></li>
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="videos.php">VIDEOS</a></li>
                    <li class="active"><a href="adversiting.php">ADVERSITING</a></li>
                    <li><a href="films.php">FILMS</a></li>
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php" class="h">ABOUT US</a></li>
                    <li><a href="contact.php" class="h">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
        <?php

        $nbre_article_total = count($publicites);

        $nbre_article_par_page=30;

        $nbre_article_max_avant_apres=4;

        $nbre_pages = ceil ($nbre_article_total / $nbre_article_par_page);

        if( isset($_GET['page']) && is_numeric($_GET["page"]) ){
            $page_num=$_GET["page"];
        }
        else{
            $page_num=1;
        }

        if($page_num<1){
            $page_num=1;
        }
        else if($page_num>$nbre_pages){
            $page_num = $nbre_pages;
        }
        $pagination="<ul class='pagination'>";

        if($nbre_pages != 1){
            if($page_num>1){
                $previous= $page_num - 1;
                $pagination.="<li class='waves-effect waves-yellow'><a href='?page=".$previous."'> <i class='material-icons'>chevron_left</i> </a></li>";
                for($i = $page_num - $nbre_article_max_avant_apres ; $i<$page_num ; $i++){
                    if($i>1){
                        $pagination.="<li class='waves-effect waves-yellow'><a href='?page=".$i."'>".$i."</a></li>";
                    }
                }
            }
        }

        $pagination.="<li class='active'><a href='?page=".$page_num."'> $page_num</a> </li>";

        for($i=$page_num+1; $i<= $nbre_pages ; $i++){
            $pagination.="<li class='waves-effect waves-yellow'><a href='?page=".$i."'>".$i."</a></li>";
            if($i>=$page_num + $nbre_article_max_avant_apres){
                break;
            }
        }
        
        if($page_num != $nbre_pages){
            $next = $page_num + 1;
            $pagination.="<li class='waves-effect waves-yellow'><a href='?page=".$next."'> <i class='material-icons'>chevron_right</i> </a> </li></ul>";
        }
        
        $limit ="LIMIT ".($page_num-1)*$nbre_article_par_page.",".$nbre_article_par_page ;
        $sql = "SELECT `idPublicite`, `titrePublicite`, `imagePublicite`,`lienPublicite`, `nomEntreprise` , DATE_FORMAT(`dateAjoutPublicite`,'%d/%m/%Y à %Hh %imin %ss') as `dateAjoutPublicite` FROM `Publicite`,`Entreprise` WHERE Entreprise.idEntreprise = Publicite.idEntreprise  ORDER BY `idPublicite` DESC $limit";
        $afficher = $db->query($sql);
        $publicites = $afficher->fetchAll(PDO::FETCH_OBJ);
        ?>
        <div class="videos" style=" margin:0px">
            <div class="container">
                <div class="row">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">LIST OF ALL OUR ADVERSITING</span>
                            <p>
                                <?php
                                echo "<strong>We have $nbre_article_total adversiting in total! </strong><br/>";
                                echo "Page <b>$page_num</b> of <b>$nbre_pages</b>";
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                $i=0;
                foreach ($publicites as $publicite) {
                    # code...
                    $i++;
                    ?>  <a href="#modal<?php echo $i; ?>" class="modal-trigger">
                            <div class="col s12 m6">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="images/<?php echo $publicite->imagePublicite; ?>">
                                        <span class="card-title"><?php echo strtoupper($publicite->titrePublicite);?></span>
                                    </div>
                                    <div class="card-content">
                                        <?php
                                        $artiste = $EntrepriseManager->getByPublicite($publicite->idPublicite);
                                        ?>
                                        <p class="black-text" style="font-family: 'Open Sans', serif;"><b> <?php echo strtoupper($artiste->nomEntreprise());?> </b></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $i; ?>" class="modal">
                            <div class="modal-content">
                                <div class="video-container">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo getYoutubeId($publicite->lienPublicite) ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                <?php
                }
                ?>
                </div>
                <div class="center">
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>
        <?php include('pages/footer.php'); ?>
    </body>
</html>