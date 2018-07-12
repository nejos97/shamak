<?php
if(isset($_GET['id']) && (int)$_GET['id']>=1){
  require_once "../script/connexiondb.php";
  require_once "../class/EntrepriseManager.class.php";

  $manager = new EntrepriseManager($db);

  $en = $manager->get((int)$_GET["id"]);
  $manager->delete($en);
  header("location:entreprise_liste.php");

}

 ?>
