<?php
require_once "Acteur.class.php";

Class ActeurManager{

    /**
     * Intance de PDO
     *
     * @var PDO
     */
    private $_db;

    public function setDb(PDO $db){
        $this->_db = $db;
    }

    public function __construct($db){
        $this->setDb($db);
    }

    /**
     * Permet d'insérer un acteur dans la BD
     *
     * @param Acteur $acteur Acteur à ajouter
     * @return int
     */
    public function add(Acteur $acteur)
    {
        $q = $this->_db->prepare('INSERT INTO acteur(nomActeur, prenomActeur) VALUES(:nomActeur, :prenomActeur)');

        $q->bindValue(':nomActeur', $acteur->nomActeur(), PDO::PARAM_STR);
        $q->bindValue(':prenomActeur', $acteur->prenomActeur(), PDO::PARAM_STR);

        if($q->execute()){
            $acteur->setIdActeur($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un acteur
     *
     * @param Acteur $acteur Objet de l'acteur à supprimer
     * @return void
     */
    public function delete(Acteur $acteur)
    {
        $requete = $this->_db->prepare("DELETE  FROM acteur WHERE idActeur = :id ");
        $requete->bindValue(":id",(int)$acteur->idActeur());
        $requete->execute();
    }

    /**
     * Retourne l'objet acteur
     *
     * @param int $idActeur id de l'acteur
     * @return void
     */
    public function get($idActeur)
    {

        $q = $this->_db->query('SELECT * FROM acteur WHERE idActeur = '.(int)$idActeur);
        $donnees = $q->fetch();

        return new Acteur($donnees);
    }

    /**
     * Retourne tous les acteurs de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $acteurs = [];
        $datas = [];

        $q = $this->_db->query("SELECT * FROM acteur ORDER BY idActeur DESC");
        if($q)
            $datas = $q->fetchAll();

        foreach ($datas as $data){
            $acteurs[] = new Acteur($data);
        }
        return $acteurs;
    }
    /**
     * Retourne tous les acteurs de la base de données
     *
     * @return array
     */

    public function getByFilm($id)
    {
        $acteurs = [];
        $datas = [];

        $q = $this->_db->query("SELECT acteur.* FROM acteur,joue WHERE joue.idActeur = acteur.idActeur AND joue.idFilm = ".$id." ORDER BY idActeur DESC");
        if($q)
            $datas = $q->fetchAll();

        foreach ($datas as $data){
            $acteurs[] = new Acteur($data);
        }
        return $acteurs;
    }

    /**
     * Permet de modifier les informations d'un acteur
     *
     * @param Acteur $acteur Acteur à supprimer
     * @return boolean
     */
    public function update(Acteur $acteur)
    {
        $q = $this->_db->prepare('UPDATE Acteur SET nomActeur = :nomActeur, prenomActeur = :prenomActeur WHERE idActeur = :idActeur');

        $q->bindValue(':nomActeur', $acteur->nomActeur(), PDO::PARAM_INT);
        $q->bindValue(':prenomActeur', $acteur->prenomActeur(), PDO::PARAM_INT);
        $q->bindValue(':idActeur', $acteur->idActeur(), PDO::PARAM_INT);

        return $q->execute();
    }
}
?>
