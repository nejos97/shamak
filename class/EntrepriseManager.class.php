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
     * Permet d'insérer un entre$entreprise dans la BD
     *
     * @param Entreprise $entreprise Entreprise à ajouter
     * @return int
     */
    public function add(Entreprise $entreprise)
    {
        $q = $this->_db->prepare('INSERT INTO Entreprise(nomEntreprise) VALUES(:nomEntreprise)');

        $q->bindValue(':nomEntreprise', $entreprise->nomEntreprise(), PDO::PARAM_INT);

        if($q->execute()){
            $entreprise->setIdEntreprise($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un entre$entreprise
     *
     * @param Entreprise $entreprise Objet de l'entre$entreprise à supprimer
     * @return void
     */
    public function delete(Entreprise $entreprise)
    {
        $this->_db->exec('DELETE FROM Entreprise WHERE idEntreprise = '.$entreprise->idEntreprise());
    }

    /**
     * Retourne l'objet entre$entreprise
     *
     * @param int $idEntreprise id de l'entreprise
     * @return void
     */
    public function get($idEntreprise)
    {

        $q = $this->_db->query('SELECT * FROM Entreprise WHERE idEntreprise = '.(int)$idEntreprise);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Entreprise($donnees);
    }

    public function getByPublicite($idPublicite){

        $q = $this->_db->query('SELECT Entreprise.* FROM Entreprise,Publicite WHERE Entreprise.idEntreprise = Publicite.idEntreprise AND Publicite.idPublicite = '.(int)$idPublicite.' ORDER BY datePubPublicite DESC');
        
        $entreprise = new Entreprise($q->fetch(PDO::FETCH_ASSOC));

        return $entreprise;
    }

    /**
     * Retourne tous les entre$entreprises de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $entreprises = [];

        $q = $this->_db->query('SELECT * FROM Entreprise ORDER BY idEntreprise DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $entreprises[] = new Entreprise($donnees);
        }

        return $entreprises;
    }

    /**
     * Permet de modifier les informations d'un entre$entreprise
     *
     * @param Entreprise $entreprise Entreprise à supprimer
     * @return boolean
     */
    public function update(Entreprise $entreprise)
    {
        $q = $this->_db->prepare('UPDATE Entreprise SET nomEntreprise = :nomEntreprise WHERE idEntreprise = :idEntreprise');
        
        $q->bindValue(':nomEntreprise', $entreprise->nomEntreprise(), PDO::PARAM_INT);
        $q->bindValue(':idEntreprise', $entreprise->idEntreprise(), PDO::PARAM_INT);

        return $q->execute();
    }
}
?>
