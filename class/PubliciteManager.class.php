<?php
require_once "Publicite.class.php";

Class PubliciteManager{

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
     * Permet d'insérer un Publicite dans la BD
     *
     * @param Publicite $publicite Publicite à ajouter
     * @return int
     */
    public function add(Publicite $publicite, $id)
    {
        $q = $this->_db->prepare('INSERT INTO Publicite(idEntreprise,titrePublicite, datePubPublicite, imagePublicite,lienPublicite,resumePublicite) VALUES(:idEntreprise, :titrePublicite, :datePubPublicite, :imagePublicite, :lienPublicite, :resumePublicite)');

        $q->bindValue(':idEntreprise', $id, PDO::PARAM_INT);
        $q->bindValue(':titrePublicite', $publicite->titrePublicite(), PDO::PARAM_INT);
        $q->bindValue(':datePubPublicite', $publicite->datePubPublicite(), PDO::PARAM_INT);
        $q->bindValue(':imagePublicite', $publicite->imagePublicite(), PDO::PARAM_INT);
        $q->bindValue(':lienPublicite', $publicite->lienPublicite(), PDO::PARAM_INT);
        $q->bindValue(':resumePublicite', $publicite->resumePublicite(), PDO::PARAM_INT);

        if($q->execute()){
            $publicite->setIdPublicite($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un Publicite
     *
     * @param Publicite $publicite Objet de l'Publicite à supprimer
     * @return void
     */
    public function delete(Publicite $publicite)
    {
        $this->_db->exec('DELETE FROM Publicite WHERE idPublicite = '.$publicite->idPublicite());
    }

    /**
     * Retourne l'objet Publicite
     *
     * @param int $idPublicite id de l'Publicite
     * @return void
     */
    public function get($idPublicite)
    {

        $q = $this->_db->query('SELECT * FROM Publicite WHERE idPublicite = '.(int)$idPublicite);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Publicite($donnees);
    }

    public function getByEntreprise($idEntreprise){

        $q = $this->_db->query('SELECT * FROM Publicite WHERE idEntreprise = '.(int)$idEntreprise.' ORDER BY datePubPublicite DESC');

        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        return new Publicite($donnees);
    }

    /**
     * Retourne tous les Publicites de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $publicites = [];

        $q = $this->_db->query('SELECT * FROM Publicite ORDER BY idPublicite DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $publicites[] = new Publicite($donnees);
        }

        return $publicites;
    }

    /**
     * Permet de modifier les informations d'un Publicite
     *
     * @param Publicite $publicite Publicite à supprimer
     * @return boolean
     */
    public function update(Publicite $publicite)
    {
        $q = $this->_db->prepare('UPDATE Publicite SET titrePublicite = :titrePublicite, datePubPublicite = :datePubPublicite, imagePublicite = :imagePublicite, lienPublicite = :lienPublicite, resumePublicite = :resumePublicite WHERE idPublicite = :idPublicite');
        
        $q->bindValue(':titrePublicite', $publicite->titrePublicite(), PDO::PARAM_INT);
        $q->bindValue(':datePubPublicite', $publicite->datePubPublicite(), PDO::PARAM_INT);
        $q->bindValue(':imagePublicite', $publicite->imagePublicite(), PDO::PARAM_INT);
        $q->bindValue(':lienPublicite', $publicite->lienPublicite(), PDO::PARAM_INT);
        $q->bindValue(':resumePublicite', $publicite->resumePublicite(), PDO::PARAM_INT);
        $q->bindValue(':idPublicite', $publicite->idPublicite(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>