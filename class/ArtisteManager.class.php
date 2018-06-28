<?php
require_once "Artiste.class.php";

Class ArtisteManager{

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
     * Permet d'insérer un artiste dans la BD
     *
     * @param Artiste $artiste Artiste à ajouter
     * @return int
     */
    public function add(Artiste $artiste)
    {
        $q = $this->_db->prepare('INSERT INTO Artiste(nomArtiste) VALUES(:nomArtiste)');

        $q->bindValue(':nomArtiste', $artiste->nomArtiste(), PDO::PARAM_INT);

        if($q->execute()){
            $artiste->setIdArtiste($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un artiste
     *
     * @param Artiste $artiste Objet de l'artiste à supprimer
     * @return void
     */
    public function delete(Artiste $artiste)
    {
      $requete = $this->_db->prepare("DELETE  FROM artiste WHERE idArtiste = :id ");
      $requete->bindValue(":id",(int)$artiste->idArtiste());
      $requete->execute();
    }

    /**
     * Retourne l'objet artiste
     *
     * @param int $idArtiste id de l'artiste
     * @return void
     */
    public function get($idArtiste)
    {

      $q = $this->_db->query('SELECT * FROM artiste WHERE idArtiste = '.(int)$idArtiste);
      $donnees = $q->fetch();

      return new Artiste($donnees);
    }

    /**
     * Retourne tous les artistes de la base de données
     *
     * @return array
     */
    public function getList()
    {
      $artistes = [];

      $q = $this->_db->query("SELECT * FROM artiste ORDER BY idArtiste DESC");
      $datas = $q->fetchAll();

      foreach ($datas as $data){
        $artistes[] = new Artiste($data);
      }
      return $artistes;
    }

    /**
     * Permet de modifier les informations d'un artiste
     *
     * @param Artiste $artiste Artiste à supprimer
     * @return boolean
     */
    public function update(Artiste $artiste)
    {
        $q = $this->_db->prepare('UPDATE Artiste SET nomArtiste = :nomArtiste WHERE idArtiste = :idArtiste');

        $q->bindValue(':nomArtiste', $artiste->nomArtiste(), PDO::PARAM_INT);
        $q->bindValue(':idArtiste', $artiste->idArtiste(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>
