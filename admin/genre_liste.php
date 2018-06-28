<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Liste des genres ajoutés";

$admin = unserialize( $_SESSION["admin"]) ;


    require_once "../script/connexiondb.php";
    require_once "../class/GenreManager.class.php";

    $manager = new GenreManager($db);

    $listes = $manager->getList();

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
                <h2>
                  Liste des genres enregistrés.
                  <a href="./genre_add.php">
                    <button class="ui teal tiny right floated button">Ajouter un genre</button>
                  </a>
                </h2>
                <table class="ui celled table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listes as $genre): ?>
                      <tr class="">
                          <td><?= $genre->idGenre() ?></td>
                          <td><?= $genre->nomGenre() ?></td>
                          <td><?= $genre->descriptionGenre() ?></td>
                          <td>
                              <a href="./genre_delete.php?id=<?= $genre->idGenre() ?>">
                                <button class="ui red circular tiny icon button">
                                  <i class="trash icon"></i>
                                </button>
                              </a>
                              <a href="">
                                <button class="ui blue circular tiny icon button">
                                  <i class="pencil icon"></i>
                                </button>
                              </a>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
              </table>
              </div>
          </div>
      </div>
    </div>

</div>
<?php include_once("include/_end.php") ?>
