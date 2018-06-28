<?php
if(isset($_GET['id']) && (int)$_GET['id']>=1){
  require_once "../script/connexiondb.php";
  require_once "../class/ActeurManager.class.php";

  $manager = new ActeurManager($db);

  $en = $manager->get( (int)$_GET["id"]);
  $manager->delete($en);
  header("location:acteur_liste.php");

}

 ?>
