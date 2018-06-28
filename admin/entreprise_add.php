<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Ajout d'une entreprise";

$admin = unserialize( $_SESSION["admin"]) ;


if(isset($_POST['submit'])){
  if(!empty($_POST['nom'])){

    require_once "../script/connexiondb.php";
    require_once "../class/EntrepriseManager.class.php";

    $manager = new EntrepriseManager($db);

    $entity = new Entreprise([
      "nomEntreprise"=>$_POST['nom'],
    ]);

    $r = $manager->add($entity);
    if($r>0){
      $message = "Entreprise ajouter avec success";
    }

  }else{
    $message = "Veillez remplir tous les champs";
  }
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
                      <h2 class="ui dividing header">Ajouter une Entreprise dans le systeme</h2>

                      <div class="required field">
                          <label>Nom de l'entreprise</label>
                          <input type="text" placeholder="Entrez le nom de l'entreprise" name="nom" class="nom" required>
                      </div>

                      <button class="ui teal right button finish" type="submit" name="submit">
                          <i class="fa fa-sign-in"></i> Enregistrer
                      </button>

                  </form>
              </div>
          </div>
      </div>
    </div>

</div>
<?php include_once("include/_end.php") ?>
