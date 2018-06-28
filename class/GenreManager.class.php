<?php
require_once "Genre.class.php";

Class GenreManager{

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
     * Permet d'insérer un genre dans la BD
     *
     * @param Genre $genre Genre à ajouter
     * @return int
     */
    public function add(Genre $genre)
    {
        $q = $this->_db->prepare('INSERT INTO Genre(nomGenre) VALUES(:nomGenre)');

        $q->bindValue(':nomGenre', $genre->nomGenre(), PDO::PARAM_INT);

        if($q->execute()){
            $genre->setIdGenre($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un genre
     *
     * @param Genre $genre Objet du genre à supprimer
     * @return void
     */
    public function delete(Genre $genre)
    {
        $this->_db->exec('DELETE FROM Genre WHERE idGenre = '.$genre->idGenre());
    }

    /**
     * Retourne l'objet genre
     *
     * @param int $idGenre id du genre
     * @return void
     */
    public function get($idGenre)
    {

        $q = $this->_db->query('SELECT * FROM Genre WHERE idGenre = '.(int)$idGenre);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Genre($donnees);
    }

    /**
     * Retourne tous les genres de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $genres = [];

        $q = $this->_db->query('SELECT * FROM Genre ORDER BY idGenre DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $genres[] = new Genre($donnees);
        }

        return $genres;
    }

    /**
     * Permet de modifier les informations d'un genre
     *
     * @param Genre $genre Genre à supprimer
     * @return boolean
     */
    public function update(Genre $genre)
    {
        $q = $this->_db->prepare('UPDATE Genre SET nomGenre = :nomGenre WHERE idGenre = :idGenre');
        
        $q->bindValue(':nomGenre', $genre->nomGenre(), PDO::PARAM_INT);
        $q->bindValue(':idGenre', $genre->idGenre(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>