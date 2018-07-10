<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Modification of enterprise";

$admin = unserialize( $_SESSION["admin"]) ;



if(isset($_POST['submit'])){
  if(!empty($_POST['nom'])){

    require_once "../script/connexiondb.php";
    require_once "../class/EntrepriseManager.class.php";

    $manager = new EntrepriseManager($db);

    $entity = new Entreprise([
        "idEntreprise"=>$_POST['id'],
        "nomEntreprise"=>$_POST['nom']
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
require_once "../class/EntrepriseManager.class.php";

$manager = new EntrepriseManager($db);
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
                      <h2 class="ui dividing header">Modification of enterprise</h2>

                      <div class="required field">
                          <label>Entreprise Name</label>
                          <input type="hidden" name="id" value="<?php echo $acteur->idEntreprise(); ?>">
                          <input type="text" placeholder="Enter the last name of enterprise" name="nom" class="nom" value="<?php echo $acteur->nomEntreprise(); ?>" required>
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
