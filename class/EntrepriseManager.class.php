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
<<<<<<< HEAD
     * @param Entreprise $entreprise Entreprise à ajouter
=======
     * @param Artiste $artiste Artiste à ajouter
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
     * @return int
     */
    public function add(Entreprise $entreprise)
    {
<<<<<<< HEAD
        $q = $this->_db->prepare('INSERT INTO Entreprise(nomEntreprise) VALUES(:nomEntreprise)');

        $q->bindValue(':nomEntreprise', $entreprise->nomEntreprise(), PDO::PARAM_INT);
=======
        $q = $this->_db->prepare('INSERT INTO entreprise(nomEntreprise) VALUES(:nomEntreprise)');

        $q->bindValue(':nomEntreprise', $entreprise->nomEntreprise(), PDO::PARAM_STR);
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f

        if($q->execute()){
            $entreprise->setIdEntreprise($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

<<<<<<< HEAD
    /**
     * Supprime un artiste
     *
     * @param Entreprise $entreprise Objet de l'artiste à supprimer
     * @return void
     */
    public function delete(Entreprise $entreprise)
    {
        $this->_db->exec('DELETE FROM Entreprise WHERE idEntreprise = '.$entreprise->idEntreprise());
=======

    public function delete(Entreprise $entreprise)
    {
      $requete = $this->_db->prepare("DELETE  FROM entreprise WHERE idEntreprise = :id ");
      $requete->bindValue(":id",(int)$entreprise->idEntreprise());
      $requete->execute();
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
    }

    /**
     * Retourne l'objet artiste
     *
<<<<<<< HEAD
     * @param int $idEntreprise id de l'artiste
=======
     * @param int $idArtiste id de l'artiste
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
     * @return void
     */
    public function get($idEntreprise)
    {

<<<<<<< HEAD
        $q = $this->_db->query('SELECT * FROM Entreprise WHERE idEntreprise = '.(int)$idEntreprise);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Entreprise($donnees);
=======
      $q = $this->_db->query('SELECT * FROM entreprise WHERE idEntreprise = '.(int)$idEntreprise);
      $donnees = $q->fetch();

      return new Entreprise($donnees);
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
    }

    /**
     * Retourne tous les artistes de la base de données
     *
     * @return array
     */
    public function getList()
    {
<<<<<<< HEAD
        $entreprises = [];

        $q = $this->_db->query('SELECT * FROM Entreprise ORDER BY idEntreprise DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $entreprises[] = new Entreprise($donnees);
        }

        return $entreprises;
=======
      $artistes = [];

      $q = $this->_db->query("SELECT * FROM entreprise ORDER BY idEntreprise DESC");
      $datas = $q->fetchAll();

      foreach ($datas as $data){
        $artistes[] = new Entreprise($data);
      }
      return $artistes;
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
    }

    /**
     * Permet de modifier les informations d'un artiste
     *
<<<<<<< HEAD
     * @param Entreprise $entreprise Entreprise à supprimer
     * @return boolean
     */
    public function update(Entreprise $entreprise)
    {
        $q = $this->_db->prepare('UPDATE Entreprise SET nomEntreprise = :nomEntreprise WHERE idEntreprise = :idEntreprise');
        
        $q->bindValue(':nomEntreprise', $entreprise->nomEntreprise(), PDO::PARAM_INT);
        $q->bindValue(':idEntreprise', $entreprise->idEntreprise(), PDO::PARAM_INT);
=======
     * @param Artiste $artiste Artiste à supprimer
     * @return boolean
     */
    public function update(Artiste $artiste)
    {
        $q = $this->_db->prepare('UPDATE Artiste SET nomArtiste = :nomArtiste WHERE idArtiste = :idArtiste');

        $q->bindValue(':nomArtiste', $artiste->nomArtiste(), PDO::PARAM_INT);
        $q->bindValue(':idArtiste', $artiste->idArtiste(), PDO::PARAM_INT);
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f

        $q->execute();
    }
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
