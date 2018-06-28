<?php
require_once "Entreprise.class.php";

Class EntrepriseManager{

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
    public function add(Entreprise $entreprise)
    {
        $q = $this->_db->prepare('INSERT INTO entreprise(nomEntreprise) VALUES(:nomEntreprise)');

        $q->bindValue(':nomEntreprise', $entreprise->nomEntreprise(), PDO::PARAM_STR);

        if($q->execute()){
            $entreprise->setIdEntreprise($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }


    public function delete(Entreprise $entreprise)
    {
      $requete = $this->_db->prepare("DELETE  FROM entreprise WHERE idEntreprise = :id ");
      $requete->bindValue(":id",(int)$entreprise->idEntreprise());
      $requete->execute();
    }

    /**
     * Retourne l'objet artiste
     *
     * @param int $idArtiste id de l'artiste
     * @return void
     */
    public function get($idEntreprise)
    {

      $q = $this->_db->query('SELECT * FROM entreprise WHERE idEntreprise = '.(int)$idEntreprise);
      $donnees = $q->fetch();

      return new Entreprise($donnees);
    }

    /**
     * Retourne tous les artistes de la base de données
     *
     * @return array
     */
    public function getList()
    {
      $artistes = [];

      $q = $this->_db->query("SELECT * FROM entreprise ORDER BY idEntreprise DESC");
      $datas = $q->fetchAll();

      foreach ($datas as $data){
        $artistes[] = new Entreprise($data);
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
