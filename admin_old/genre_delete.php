<?php
if(isset($_GET['id']) && (int)$_GET['id']>=1){
  require_once "../script/connexiondb.php";
  require_once "../class/GenreManager.class.php";

  $manager = new GenreManager($db);

  $en = $manager->get((int)$_GET["id"]);
  $manager->delete($en);
  header("location:genre_liste.php");

}

 ?>
