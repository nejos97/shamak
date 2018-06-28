<?php

require_once "/../defines/defines.php";

/* Connexion à une base ODBC avec l'invocation de pilote */

try {
    $db = new PDO(DSN, USER, PWD);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
