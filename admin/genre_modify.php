<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Modification of genre";

$admin = unserialize( $_SESSION["admin"]) ;



if(isset($_POST['submit'])){
  if(!empty($_POST['nom'])){

    require_once "../script/connexiondb.php";
    require_once "../class/GenreManager.class.php";

    $manager = new GenreManager($db);

    $entity = new Genre([
        "idGenre"=>$_POST['id'],
        "nomGenre"=>$_POST['nom'],
        "descriptionGenre"=>$_POST['description'],
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
require_once "../class/GenreManager.class.php";

$manager = new GenreManager($db);
$genre = $manager->get($_GET['id']);
if(!isset($_GET['id'])){
    header("location:genre_liste.php");
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
                      <h2 class="ui dividing header">Modification of genre</h2>

                      <div class="required field">
                          <label>Genre name</label>
                          <input type="hidden" name="id" value="<?php echo $genre->idGenre(); ?>">
                          <input type="text" placeholder="Enter the genre name of genre" name="nom" class="nom" value="<?php echo $genre->nomGenre(); ?>" required>
                      </div>

                      <div class="required field">
                          <label>Description</label>
                          <input type="text" placeholder="Enter the description of genre" name="description" class="description" value="<?php echo $genre->descriptionGenre() ?>">
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
