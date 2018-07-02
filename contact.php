<?php
if(isset($_POST['Sug']) AND $_POST['Sug']=="Sug"){
    if(isset($_POST['nomSug'],$_POST['emailSug'],$_POST['sujetSug'],$_POST['messageSug']) AND !empty($_POST['nomSug']) AND !empty($_POST['emailSug']) AND !empty($_POST['sujetSug']) AND !empty($_POST['messageSug'])){
        require_once "script/connexiondb.php";
        require_once "class/SugestionsManager.class.php";
        $SugestionsManager = New SugestionsManager($db);
        $sugestions = New Sugestions(array(
            "nomSug" => htmlspecialchars($_POST['nomSug']),
            "emailSug" => htmlspecialchars(strtolower($_POST['emailSug'])),
            "sujetSug" => htmlspecialchars($_POST['sujetSug']),
            "messageSug" => htmlspecialchars($_POST['messageSug']),
        ));
        if($SugestionsManager->add($sugestions)>0){
            $message = "Your message has been sended !";
        }
        else{
            $message = "Error ! Please resend again";
        }
    }
    else{
        $message ="Please fill all the items";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Contact - Shamak Allharamadji</title>

        <link href="images/favicon.svg" rel="shortcut icon" type="image/x-icon">
        <link href="css/css.css" rel="stylesheet" type="text/css">
        <link href="css/icon.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style>
        .bas{
            margin-bottom:0px;
            padding:10px 30px 50px 30px;
        }
        .row.message{
            padding:50px;
            border-radius:10px;
        }
        
        @media only screen and (max-width: 900px) {
            .row.message{
                padding:20px;
            }
            .bas{
                margin-bottom:0px;
                padding:10px 15px 50px 15px;
            }
        }
        @media only screen and (max-width: 700px) {
            .row.message{
                padding:5px;
            }
            .bas{
                margin-bottom:0px;
                padding:10px 5px 40px 5px;
            }
        }
        
        @media only screen and (max-width: 500px) {
            .row.message{
                padding:5px;
            }
        }
        @media only screen and (max-width: 400px) {
            .row.message{
                padding:5px;
            }
            .bas{
                margin-bottom:0px;
                padding:10px 0px 20px 0px;
            }
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
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li class="active"><a href="contact.php">CONTACT US</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="videos.php">VIDEOS</a></li>
                    <li><a href="adversiting.php">ADVERSITING</a></li>
                    <li><a href="films.php">FILMS</a></li>
                    <li><a href="ourteam.php">OUR TEAM</a></li>
                    <li><a href="about.php" class="h">ABOUT US</a></li>
                    <li class="active"><a href="contact.php" class="h">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="grey darken-2">
            <div style="padding:30px 0px" class="center white-text">
                <h4 style="font-weight:900">CONTACT US</h4>
                <p>If you want to ask me aniting send me the message here</p>
            </div>
            <div class="row bas">
                <form class="col s12" method="post" action="">
                    <div class="row card hoverable message" style="margin-bottom:0px">
                        <div class="col s12 m8">
                            <?php
                            if(isset($message))
                            echo '
                            <div class="row">
                                <div class="card-panel">
                                    <span class="blue-text text-darken-2">'.$message.'</span>
                                </div>
                            </div>
                                ';
                            ?>
                            <div class="row">
                                <div class="input-field col s6 m6">
                                    <input id="nomSug" name="nomSug" type="text" class="validate">
                                    <label for="nomSug" name="nomSug">Your Name</label>
                                </div>
                                <div class="input-field col s6 m6">
                                    <input id="emailSug" name="emailSug" type="email" class="validate">
                                    <label for="emailSug">Your Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <input id="sujetSug" name="sujetSug" type="text" class="validate">
                                    <label for="sujetSug" name="sujetSug">Subject</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <textarea id="messageSug" name="messageSug" class="materialize-textarea"></textarea>
                                    <label for="messageSug" name="messageSug">Your message here...</label>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn" role="submit" name="Sug" value="Sug">
                                    <i class="fa fa-send"></i> Send
                                </button>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="card hoverable sticky-action">
                                <div class="card-image">
                                    <img class="activator" src="images/fond2.jpg">
                                </div>
                                <div class="card-content">
                                    <p class="activator">
                                        <i class="fa fa-map-marker"></i> Douala, Cameroun <br>
                                        <i class="fa fa-phone"></i> +237 690 327 402 <br>
                                        <i class="fa fa-envelope"></i> shamak@gmail.com
                                    </p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m12">

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b3746485a865abe"></script> 
        <?php include('pages/footer.php'); ?>
    </body>
</html>