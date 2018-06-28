<?php include_once("script/init.php"); ?>

<?php

$title = "Connexion";

if(isset($_SESSION["admin"])){
    header('location:index.php');
}
if(isset($_POST['submit'])){
	if(isset($_POST['email']) AND isset($_POST['password']) AND !empty($_POST['email']) AND !empty($_POST['password'])){

        require_once "../script/connexiondb.php";
        require_once "../class/AdminManager.class.php";

        $mdp = htmlspecialchars(sha1($_POST['password']));
        $email = htmlspecialchars($_POST['email']);

        $AdminManager = New AdminManager($db);
        $obj = $AdminManager->connexion($email,$mdp);


        if(is_object($obj)){
            $AdminManager->setConnectedUser($obj);
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

<?php include("include/_header.php") ?>

<br><br>
<div class="container">
    <div class="ui two column centered grid">
        <div class="column">

            <?php isset($msg) ? $msg : "ok"  ?>

            <form class="ui form" method="POST" action="">
                <h2 class="ui dividing header">Connexion admin</h2>
                <div class="field">
                    <label>E-mail</label>
                    <input type="text" placeholder="Entrez votre email" name="email" class="email" required>
                </div>
                <div class="field">
                    <label>Mot de passe</label>
                    <input type="password" placeholder="Entrez votre mot de passe" name="password" class="password" required>
                </div>
                <button class="ui teal right button finish" type="submit" name="submit">
                    <i class="fa fa-sign-in"></i> Se connecter
                </button>
            </form>

        </div>
    </div>
</div>

<?php include("include/_end.php") ?>
