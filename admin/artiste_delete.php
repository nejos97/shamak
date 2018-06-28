<?php
if(isset($_GET['id']) && (int)$_GET['id']>=1){
  require_once "../script/connexiondb.php";
  require_once "../class/ArtisteManager.class.php";

  $manager = new ArtisteManager($db);

  $en = $manager->get((int)$_GET["id"]);
  $manager->delete($en);
  header("location:artiste_liste.php");

}

 ?>
