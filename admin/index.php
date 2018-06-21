<?php
require_once "../script/connexiondb.php";
require_once "../class/AdminManager.class.php";

if(!isset($_COOKIE["emailAdmin"],$_COOKIE["mdpAdmin"])){
    header('location:connexion.php');
}

$email = htmlspecialchars($_COOKIE['emailAdmin']);
$mdp = htmlspecialchars($_COOKIE['mdpAdmin']);
$AdminManager = New AdminManager($db);
$id = $AdminManager->connexion($email,$mdp);
if($id<1){
    setcookie("emailAdmin",$email,time());
    setcookie("mdpAdmin",$mdp,time());
    header("location:connexion.php");
}
$utilisateur = $AdminManager->get($id);

//require_once "functions/liste.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
    <!--Import Google Icon Font-->
    <link href="../css/css.css" rel="stylesheet" type="text/css">
    <link href="../css/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.css">
    
    <!-- CSS  -->
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style>
    footer div.row {
        padding: 20px 40px;
    }
</style>
    <title>Welcome <?php echo ucwords($utilisateur->nomAdmin()." ".$utilisateur->prenomAdmin()) ?></title>

</head>
    <body>
        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">
                    <span class="logo-text hide-on-med-and-down">Shamak</span>
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="index.php">Accueil</a></li>
                    <li><a href="mescroniques.php">Mes Chroniques</a></li>
                    <li><a href="momentsdecriture.php">Moments d'écriture</a></li>
                    <li><a href="lookbook.php">Lookbook</a></li>
                    <li><a href="emotion.php">Emotion</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li class="active"><a href="index.php">Accueil</a></li>
                    <li><a href="mescroniques.php">Mes Chroniques</a></li>
                    <li><a href="momentsdecriture.php">Moments d'écriture</a></li>
                    <li><a href="lookbook.php">Lookbook</a></li>
                    <li><a href="emotion.php">Emotion</a></li>
                </ul>
            </div>
        </nav>
    <?php $colors = array("blue-grey"); ?>
    <div class="row">
        <div class="row deep-purple" style="padding:80px;">
            <h6 class="header center white-text text-lighten-2">Cette page est réservée uniquement à l'administrateur du site</h6>
        </div>
        <div class="" style="margin-top=20px">
            <div class="row center">
                <a href="ajouter.php" class="btn-large waves-effect waves-light teal lighten-1 pulse"><i class="fa fa-calendar-plus-o"></i> Ajouter un article</a>
            </div>
        </div>
    </div>
    <footer class="page-footer blue lighten-1">
        <div class="row">
            <div class="col m12 s12">
                <h5 class="black-text white">A PROPOS</h5>
                <p class="white-text text-darken-1 thin">
                    Interface d'administration des chroniques de suzanne
                </p>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container black-text">
            Copyright ©2018 All rights reserved - Made with <i class="fa fa-heart pink-text"></i> by <a class="white-text text-lighten-1" href="mailto:alladintroumba@gmail.com">#l@d!n$t@r#</a>
            </div>
        </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script>
    
    $(document).ready(function(){
        
        $(".button-collapse").sideNav();
        
        $(".dropdown-button").dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        });
        
    });
        
    </script>
</body>
</html>