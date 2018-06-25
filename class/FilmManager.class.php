<?php
require_once "Film.class.php";

Class FilmManager{

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
     * Permet d'insérer un utilisateur dans la BD
     *
     * @param Film $utilisateur Film à ajouter
     * @return int
     */
    public function add(Film $utilisateur)
    {
        $q = $this->_db->prepare('INSERT INTO Film(titreFilm, datePubFilm, imageFilm, lienFilm, resumeFilm) VALUES(:titreFilm, :datePubFilm, :imageFilm, :lienFilm, :resumeFilm)');

        $q->bindValue(':titreFilm', $utilisateur->titreFilm(), PDO::PARAM_INT);
        $q->bindValue(':datePubFilm', $utilisateur->datePubFilm(), PDO::PARAM_INT);
        $q->bindValue(':imageFilm', $utilisateur->imageFilm(), PDO::PARAM_INT);
        $q->bindValue(':lienFilm', $utilisateur->lienFilm(), PDO::PARAM_INT);
        $q->bindValue(':resumeFilm', $utilisateur->resumeFilm(), PDO::PARAM_INT);

        if($q->execute()){
            $utilisateur->setIdFilm($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un utilisateur
     *
     * @param Film $utilisateur Objet de l'utilisateur à supprimer
     * @return void
     */
    public function delete(Film $utilisateur)
    {
        $this->_db->exec('DELETE FROM Film WHERE idFilm = '.$utilisateur->idFilm());
    }

    /**
     * Retourne l'objet utilisateur
     *
     * @param int $idFilm id de l'utilisateur
     * @return void
     */
    public function get($idFilm)
    {

        $q = $this->_db->query('SELECT * FROM Film WHERE idFilm = '.(int)$idFilm);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Film($donnees);
    }

    /**
     * Retourne tous les utilisateurs de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $utilisateurs = [];

        $q = $this->_db->query('SELECT * FROM Film ORDER BY idFilm DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $utilisateurs[] = new Film($donnees);
        }

        return $utilisateurs;
    }

    /**
     * Permet de modifier les informations d'un utilisateur
     *
     * @param Film $utilisateur Film à supprimer
     * @return boolean
     */
    public function update(Film $utilisateur)
    {
        $q = $this->_db->prepare('UPDATE Film SET titreFilm = :titreFilm, dateAjoutFilm = :dateAjoutFilm, datePubFilm = :datePubFilm, imageFilm = :imageFilm, lienFilm = :lienFilm, resumeFilm = :resumeFilm, photoFilm = :photoFilm WHERE idFilm = :idFilm');
        
        $q->bindValue(':titreFilm', $utilisateur->titreFilm(), PDO::PARAM_INT);
        $q->bindValue(':datePubFilm', $utilisateur->datePubFilm(), PDO::PARAM_INT);
        $q->bindValue(':dateAjoutFilm', $utilisateur->dateAjoutFilm(), PDO::PARAM_INT);
        $q->bindValue(':imageFilm', $utilisateur->imageFilm(), PDO::PARAM_INT);
        $q->bindValue(':lienFilm', $utilisateur->lienFilm(), PDO::PARAM_INT);
        $q->bindValue(':resumeFilm', $utilisateur->resumeFilm(), PDO::PARAM_INT);
        $q->bindValue(':photoFilm', $utilisateur->photoFilm(), PDO::PARAM_INT);
        $q->bindValue(':idFilm', $utilisateur->idFilm(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>