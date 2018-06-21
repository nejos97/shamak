<?php
// <>
if(isset($_COOKIE["emailAdmin"]) AND isset($_COOKIE["mdpAdmin"])){
    header('location:index.php');
}
if(isset($_POST['submit'])){
	if(isset($_POST['emailAdmin']) AND isset($_POST['mdpAdmin']) AND !empty($_POST['emailAdmin']) AND !empty($_POST['mdpAdmin'])){
        
        require_once "../script/connexiondb.php";
        require_once "../class/AdminManager.class.php";
        
        $mdp = htmlspecialchars(sha1($_POST['mdpAdmin']));
        $email = htmlspecialchars($_POST['emailAdmin']);

        $AdminManager = New AdminManager($db);
        if($AdminManager->connexion($email,$mdp)){
            setcookie("emailAdmin",$email,time()+3600*24*365);
            setcookie("mdpAdmin",$mdp,time()+3600*24*365);
            header("location:index.php");
        }
        else{
            $msg = "L'adresse email ou le mot de passe est incorrect";
        }
    }
    else{
        $msg = "Veillez remplir tous les champs s'il vous plait";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Shamack Allharamadji - Connexion administrateur</title>

        <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
        <!--Import Google Icon Font-->
        <link href="../css/css.css" rel="stylesheet" type="text/css">
        <link href="../css/icon.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/font-awesome.css">
        
        <!-- CSS  -->
        <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
            flex: 1 0 auto;
            }

            body {            }

            .input-field input[type=date]:focus + label,
            .input-field input[type=text]:focus + label,
            .input-field input[type=email]:focus + label,
            .input-field input[type=password]:focus + label {
                color: #e91e63;
            }

            .input-field input[type=date]:focus,
            .input-field input[type=text]:focus,
            .input-field input[type=email]:focus,
            .input-field input[type=password]:focus {
                border-bottom: 2px solid #e91e63;
                box-shadow: none;
            }
            .btn:focus, .btn-large:focus, .btn-floating:focus {
                background-color: #ff0d5f;
            }
            .material-icons {
                font-family: 'Material Icons';
                font-weight: normal;
                font-style: normal;
                font-size: 24px;
                display: inline-block;
                line-height: 1;
                text-transform: none;
                letter-spacing: normal;
                word-wrap: normal;
                white-space: nowrap;
                direction: ltr;
                -webkit-font-smoothing: antialiased;
                text-rendering: optimizeLegibility;
                -moz-osx-font-smoothing: grayscale;
                font-feature-settings: 'liga';
            }
            .pt-5 {
                padding-top: 5% !important;
            }
            .login-form-text {
                text-transform: uppercase;
                letter-spacing: 2px;
                font-size: 0.8rem;
            }
            .z-depth-1{
                display: inline-block;
                padding: 32px 48px 0px 48px;
                border: 1px solid #EEE;
                transition:all 1s ease-in-out;
            }

            @media only screen and (max-width: 500px) {
                .z-depth-1{
                    padding: 2px 8px 0px 8px;
                }
                .container .row {
                    margin:none;
                }
            }
            /* label color */
           .input-field label {
             color: #000;
           }
           /* label focus color */
           .input-field input[type=text]:focus + label {
             color: #000;
           }
           /* label underline focus color */
           .input-field input[type=text]:focus {
             border-bottom: 1px solid #000;
             box-shadow: 0 1px 0 0 #000;
           }
           /* valid color */
           .input-field input[type=text].valid {
             border-bottom: 1px solid #000;
             box-shadow: 0 1px 0 0 #000;
           }
           /* invalid color */
           .input-field input[type=text].invalid {
             border-bottom: 1px solid #000;
             box-shadow: 0 1px 0 0 #000;
           }
           /* icon prefix focus color */
           .input-field .prefix.active {
             color: #000;
           }
           input[type="password"].valid:not(.browser-default), input[type="password"].valid:not(.browser-default):focus,input[type="email"].valid:not(.browser-default), input[type="email"].valid:not(.browser-default):focus{
                border-bottom: 1px solid #000;
                -webkit-box-shadow: 0 1px 0 0 #000;
                box-shadow: 0 1px 0 0 #000;
           }
        </style>
    </head>
    <body class="loaded">
        <div class="section"></div>
        <main>
            <center>
            
            <div class="container">
            <div class="z-depth-1 grey lighten-4 row" style="">
                <img class="responsive-img" style="width: 100px;" src="../images/favicon.svg" />
                

                <h5 class="black-text login-form-text">Connectez-vous à votre compte</h5>
                <form class="col s12" method="post" action="">
                    <div class='row'>
                        <div class='col s12 pink-text'>
                            <?php
                            if(isset($msg)){
                                echo $msg;
                            }
                            ?>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12 black-text'>
                            <i class="material-icons prefix pt-5 ">person_outline</i>
                            <input class='validate' type='email' name='emailAdmin' id='email' autofocus="autofocus" />
                            <label for='email'>Entrez votre email</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class="material-icons prefix pt-5">lock_outline</i>
                            <input class='validate' type='password' name='mdpAdmin' id='password' />
                            <label for='password'>Entrez votre mot de passe</label>
                        </div>
                        <label style='float:right;'>
                            <a class='black-text' href='mdpoublie.php'><b>Mot de passe oublié ?</b></a>
                        </label>
                    </div>

                    <br/>
                    <center>
                    <div class='row'>
                        <button type='submit' name='submit' class='col s12 btn btn-large waves-effect black'>Login</button>
                    </div>
                    </center>
                </form>
                </div>
            </div>
            </center>

            <div class="section"></div>
            <div class="section"></div>
        </main>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/init.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
</html>