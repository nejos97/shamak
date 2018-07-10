<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Modification of actor";

$admin = unserialize( $_SESSION["admin"]) ;



if(isset($_POST['submit'])){
  if(!empty($_POST['nom'])){

    require_once "../script/connexiondb.php";
    require_once "../class/ActeurManager.class.php";

    $manager = new ActeurManager($db);

    $entity = new Acteur([
        "idActeur"=>$_POST['id'],
        "nomActeur"=>$_POST['nom'],
        "prenomActeur"=>$_POST['prenom'],
    ]);

    $r = $manager->update($entity);
    if($r){
        $message = "Success !";
    }
    else{
        $message = "Error !";
    }

  }else{
    $message = "Please fill all item";
  }
}
require_once "../script/connexiondb.php";
require_once "../class/ActeurManager.class.php";

$manager = new ActeurManager($db);
$acteur = $manager->get($_GET['id']);
if(!isset($_GET['id'])){
    header("location:acteur_liste.php");
}
?>

<?php include_once("include/_header.php") ?>

<div class="ui grid container aligned">
    <div class="four wide column">
        <?php  include_once("include/_sidebar.php"); ?>
    </div>

    <div class="ten wide column">
      <div class="container">
          <div class="ui grid">
              <div class="column">
                  <form class="ui form" method="POST" action="">
                      <h2 class="ui dividing header">Modification of actor</h2>

                      <div class="required field">
                          <label>Last Name</label>
                          <input type="hidden" name="id" value="<?php echo $acteur->idActeur(); ?>">
                          <input type="text" placeholder="Enter the last name of actor" name="nom" class="nom" value="<?php echo $acteur->nomActeur(); ?>" required>
                      </div>

                      <div class="required field">
                          <label>First Name</label>
                          <input type="text" placeholder="Enter the first name of actor" name="prenom" class="prenom" value="<?php echo $acteur->prenomActeur() ?>">
                      </div>

                      <button class="ui teal right button finish" type="submit" name="submit">
                          <i class="fa fa-sign-in"></i> Modify
                      </button>

                  </form>
              </div>
          </div>
      </div>
    </div>

</div>
<?php include_once("include/_end.php") ?>
