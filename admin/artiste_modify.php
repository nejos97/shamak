<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Modification of artist";

$admin = unserialize( $_SESSION["admin"]) ;



if(isset($_POST['submit'])){
  if(!empty($_POST['nom'])){

    require_once "../script/connexiondb.php";
    require_once "../class/ArtisteManager.class.php";

    $manager = new ArtisteManager($db);

    $entity = new Artiste([
        "idArtiste"=>$_POST['id'],
        "nomArtiste"=>$_POST['nom']
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
require_once "../class/ArtisteManager.class.php";

$manager = new ArtisteManager($db);
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
                      <h2 class="ui dividing header">Modification of artist</h2>

                      <div class="required field">
                          <label>Artiste Name</label>
                          <input type="hidden" name="id" value="<?php echo $acteur->idArtiste(); ?>">
                          <input type="text" placeholder="Enter the last name of artist" name="nom" class="nom" value="<?php echo $acteur->nomArtiste(); ?>" required>
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
