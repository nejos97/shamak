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
     * Ajouter un film dans la BD
     *
     * @param Film $film Film à ajouter
     * @param array $genre Identifiant du genre du film
     * @param array $acteurs identifiants des acteurs du film
     * @return int
     */
    public function add(Film $film, array $genres, array $acteurs)
    {
        $q = $this->_db->prepare('INSERT INTO Film(titreFilm, datePubFilm, imageFilm, lienFilm, resumeFilm) VALUES(:titreFilm, :datePubFilm, :imageFilm, :lienFilm, :resumeFilm)');

        $q->bindValue(':titreFilm', $film->titreFilm(), PDO::PARAM_INT);
        $q->bindValue(':datePubFilm', $film->datePubFilm(), PDO::PARAM_INT);
        $q->bindValue(':imageFilm', $film->imageFilm(), PDO::PARAM_INT);
        $q->bindValue(':lienFilm', $film->lienFilm(), PDO::PARAM_INT);
        $q->bindValue(':resumeFilm', $film->resumeFilm(), PDO::PARAM_INT);
        
        if($q->execute()){
            $film->setIdFilm($this->_db->lastInsertId());
            $id = $this->_db->lastInsertId();

            foreach ($genres as $genre) {
                # code...
                $q = $this->_db->prepare('INSERT INTO Comprend(idFilm, idGenre) VALUES(:idFilm, :idGenre)');
                $q->bindValue(':idFilm', $id, PDO::PARAM_INT);
                $q->bindValue(':idGenre', $genre, PDO::PARAM_INT);
                $q->execute();
            }
            foreach ($acteurs as $acteur) {
                $q = $this->_db->prepare('INSERT INTO Joue(idFilm, idActeur) VALUES(:idFilm, :idActeur)');

                $q->bindValue(':idActeur',$acteur, PDO::PARAM_INT);
                $q->bindValue(':idFilm',$id, PDO::PARAM_INT);
                $q->execute();
            }
            return $id;
        }
    }

    /**
     * Supprime un utilisateur
     *
     * @param Film $film Objet de l'utilisateur à supprimer
     * @return void
     */
    public function delete(Film $film)
    {
        $this->_db->exec('DELETE FROM Film WHERE idFilm = '.$film->idFilm());
    }

    /**
     * Retourne un film
     *
     * @param int $idFilm id du film
     * @return Film
     */
    public function get($idFilm)
    {

        $q = $this->_db->query('SELECT * FROM Film WHERE idFilm = '.(int)$idFilm);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        if($donnees)
            return new Film($donnees);
        else
            return new Film(array());
    }

    /**
     * Retourne tous les films de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $films = [];

        $q = $this->_db->query('SELECT * FROM Film ORDER BY idFilm DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $films[] = new Film($donnees);
        }

        return $films;
    }

    /**
     * Permet de modifier les informations d'un utilisateur
     *
     * @param Film $film Film à supprimer
     * @return boolean
     */
    public function update(Film $film)
    {
        $q = $this->_db->prepare('UPDATE Film SET titreFilm = :titreFilm, dateAjoutFilm = :dateAjoutFilm, datePubFilm = :datePubFilm, imageFilm = :imageFilm, lienFilm = :lienFilm, resumeFilm = :resumeFilm, photoFilm = :photoFilm WHERE idFilm = :idFilm');
        
        $q->bindValue(':titreFilm', $film->titreFilm(), PDO::PARAM_INT);
        $q->bindValue(':datePubFilm', $film->datePubFilm(), PDO::PARAM_INT);
        $q->bindValue(':dateAjoutFilm', $film->dateAjoutFilm(), PDO::PARAM_INT);
        $q->bindValue(':imageFilm', $film->imageFilm(), PDO::PARAM_INT);
        $q->bindValue(':lienFilm', $film->lienFilm(), PDO::PARAM_INT);
        $q->bindValue(':resumeFilm', $film->resumeFilm(), PDO::PARAM_INT);
        $q->bindValue(':photoFilm', $film->photoFilm(), PDO::PARAM_INT);
        $q->bindValue(':idFilm', $film->idFilm(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>