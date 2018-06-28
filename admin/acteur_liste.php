<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Liste des acteurs ajoutés";

$admin = unserialize( $_SESSION["admin"]) ;


    require_once "../script/connexiondb.php";
    require_once "../class/ActeurManager.class.php";

    $manager = new ActeurManager($db);

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
                  Liste des acteurs enregistrés.
                  <a href="./acteur_add.php">
                    <button class="ui teal tiny right floated button">Ajouter un acteur</button>
                  </a>
                </h2>
                <table class="ui celled table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listes as $acteur): ?>
                      <tr class="">
                          <td><?= $acteur->idActeur() ?></td>
                          <td><?= $acteur->nomActeur() ?></td>
                          <td><?= $acteur->prenomActeur() ?></td>
                          <td>
                              <a href="./acteur_delete.php?id=<?= $acteur->idActeur() ?>">
                                <button class="ui red circular tiny icon button">
                                  <i class="trash icon"></i>
                                </button>
                              </a>
                              <a href=" {% url 'collaboration_delete' coll.id %} ">
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
