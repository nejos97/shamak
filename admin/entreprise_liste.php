<?php include_once("script/init.php");  ?>
<?php

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$title = "Liste des entreprises ajoutés";

$admin = unserialize( $_SESSION["admin"]) ;


    require_once "../script/connexiondb.php";
    require_once "../class/EntrepriseManager.class.php";

    $manager = new EntrepriseManager($db);

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
                  Liste des Entreprise enregistrés.
                  <a href="./entreprise_add.php">
                    <button class="ui teal tiny right floated button">Ajouter une entreprise</button>
                  </a>
                </h2>
                <table class="ui celled table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listes as $entreprise): ?>
                      <tr class="">
                          <td><?= $entreprise->idEntreprise() ?></td>
                          <td><?= $entreprise->nomEntreprise() ?></td>
                          <td>
                              <a href="./entreprise_delete.php?id=<?= $entreprise->idEntreprise() ?>">
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
