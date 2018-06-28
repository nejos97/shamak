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
<<<<<<< HEAD
        $q = $this->_db->prepare('INSERT INTO Genre(nomGenre) VALUES(:nomGenre)');

        $q->bindValue(':nomGenre', $genre->nomGenre(), PDO::PARAM_INT);
=======
      $q = $this->_db->prepare('INSERT INTO genre(nomGenre, descriptionGenre) VALUES(:one, :two)');

      $q->bindValue(':one', $genre->nomGenre(), PDO::PARAM_STR);
      $q->bindValue(':two', $genre->descriptionGenre(), PDO::PARAM_STR);
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f

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
      $requete = $this->_db->prepare("DELETE  FROM genre WHERE idGenre = :id ");
      $requete->bindValue(":id",(int)$genre->idGenre());
      $requete->execute();
    }

    /**
     * Retourne l'objet genre
     *
     * @param int $idGenre id du genre
     * @return void
     */
    public function get($idGenre)
    {

      $q = $this->_db->query('SELECT * FROM genre WHERE idGenre = '.(int)$idGenre);
      $donnees = $q->fetch();

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

        $q = $this->_db->query("SELECT * FROM genre ORDER BY idGenre DESC");
        $datas = $q->fetchAll();

        foreach ($datas as $data){
          $genres[] = new Genre($data);
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
<<<<<<< HEAD
        $q = $this->_db->prepare('UPDATE Genre SET nomGenre = :nomGenre WHERE idGenre = :idGenre');
        
=======
        $q = $this->_db->prepare('UPDATE Genre SET nomGenre = :nomGenre, descriptionGenre = :descriptionGenre WHERE idGenre = :idGenre');

>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
        $q->bindValue(':nomGenre', $genre->nomGenre(), PDO::PARAM_INT);
        $q->bindValue(':idGenre', $genre->idGenre(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>
