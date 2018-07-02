<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php $erreur = $_GET['erreur']; echo $erreur; ?> Error !</title>
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                font-family: Segoe UI, Droid Sans, DejaVu Sans, sans-serif;
                font-size: 12pt;
                color: #555;
                line-height: 1.5em;
                font-weight: 300;
            }

            body {
                padding: 2.5em;
                background-color: #333;
            }

            a {
                cursor: pointer;
                color: #06c;
                text-decoration: none;
            }

            h1 {
                color: #444;
            	background-color: #fff;
            	border-bottom: 1px solid #333;
            	font-size: 19px;
            	font-weight: normal;
            	margin: 0 0 14px 0;
            	padding: 14px 15px 10px 15px;
            }

            #container {
            	margin: 10px;
            	border: 1px solid #333;
            	box-shadow: 0 0 8px #333;
            	background-color: #fff;
            }

            p {
            	margin: 12px 15px 12px 15px;
            }
            .btn{
                display:inline-block;
                padding:10px;
                border:1px solid transparent;
                background-color:rgba(155,14,200,1);
                color:white;
                font-weight:500;
                transition:all 0.5s ease-out;
            }
            .btn:hover{
                border:1px solid black;
                background-color:rgba(210,210,210,1);
                color:black;
                transition:all 0.5s ease-out;
            }
        </style>
    </head>
    <body>
    
        <div id="container">
        <?php
            echo "<h1> Error ".$erreur."</h1>";
            echo "<p>";
                
            switch($erreur)
            {
            case '400':
            echo 'Échec de l\'analyse HTTP.';
            break;
            case '401':
            echo 'Le pseudo ou le mot de passe n\'est pas correct !';
            break;
            case '402':
            echo 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
            break;
            case '403':
            echo 'Requête interdite !';
            break;
            case '404':
            echo 'La page n\'existe pas ou plus !';
            break;
            case '405':
            echo 'Méthode non autorisée.';
            break;
            case '500':
            echo 'Erreur interne au serveur ou serveur saturé.';
            break;
            case '501':
            echo 'Le serveur ne supporte pas le service demandé.';
            break;
            case '502':
            echo 'Mauvaise passerelle.';
            break;
            case '503':
            echo ' Service indisponible.';
            break;
            case '504':
            echo 'Trop de temps à la réponse.';
            break;
            case '505':
            echo 'HTTP Version Not Supported.';
            break;
            default:
            echo 'Error !';
            }
            echo "</p>"
            ?>
            <?php
            if ($erreur!="") {
                $referer = getenv('HTTP_REFERER'); // on récupère l'URL de la page d'origine
                $uri = $_SERVER['REQUEST_URI']; // on récupère l'URL de la page cause de l'erreur
                $ip_visiteur = $_SERVER['REMOTE_ADDR']; // on récupère l'IP du visiteur (pour stats - facultatif)
                $date = date('d-m-y', time()); // on récupère la date de l'erreur (pour stats - facultatif)
                $heure = date('h:m:s', time()); // on récupère l'heure de l'erreur (pour stats - facultatif)

                // On décide d'envoyer cette erreur par mail : on prépare donc le contenu :
                echo "
                <p>
                    Time : $date at $heure <br/>
                    Your IP : $ip_visiteur <br/>
                    Referer : $referer <br/>
                    URI : $uri
                </p>
                ";
            }
            ?>
            <p>
                <a href="<?php echo $referer; ?>" class="btn">Back to the previous page</a>
            </p>
        </div>
    </body>
</html>