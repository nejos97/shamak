<?php
require_once "Musique.class.php";

Class MusiqueManager{

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
     * Permet d'insérer un Musique dans la BD
     *
     * @param Musique $musique Musique à ajouter
     * @return int
     */
    public function add(Musique $musique,Artiste $artiste)
    {
        $q = $this->_db->prepare('INSERT INTO Musique(idArtiste,titreMusique, datePubMusique, imageMusique,lienMusique,resumeMusique,autreMusique) VALUES(:idArtiste, :titreMusique, :datePubMusique, :imageMusique, :lienMusique, :resumeMusique,:autreMusique)');

        $q->bindValue(':idArtiste', $artiste->idArtiste(), PDO::PARAM_INT);
        $q->bindValue(':titreMusique', $musique->titreMusique(), PDO::PARAM_INT);
        $q->bindValue(':datePubMusique', $datePubMusique, PDO::PARAM_INT);
        $q->bindValue(':imageMusique', $musique->imageMusique(), PDO::PARAM_INT);
        $q->bindValue(':lienMusique', $musique->lienMusique(), PDO::PARAM_INT);
        $q->bindValue(':resumeMusique', $musique->resumeMusique(), PDO::PARAM_INT);
        $q->bindValue(':autreMusique', $musique->autreMusique(), PDO::PARAM_INT);

        if($q->execute()){
            $musique->setIdMusique($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un Musique
     *
     * @param Musique $musique Objet de l'Musique à supprimer
     * @return void
     */
    public function delete(Musique $musique)
    {
        $this->_db->exec('DELETE FROM Musique WHERE idMusique = '.$musique->idMusique());
    }

    /**
     * Retourne l'objet Musique
     *
     * @param int $idMusique id de l'Musique
     * @return void
     */
    public function get($idMusique)
    {

        $q = $this->_db->query('SELECT * FROM Musique WHERE idMusique = '.(int)$idMusique);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Musique($donnees);
    }

    public function getByArtiste($idArtiste){

        $q = $this->_db->query('SELECT * FROM Musique WHERE idArtiste = '.(int)$idArtiste.' ORDER BY datePubMusique DESC');
        
        $musiques = [];

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $musiques[] = new Musique($donnees);
        }

        return $musiques;
    }

    /**
     * Retourne tous les Musiques de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $musiques = [];

        $q = $this->_db->query('SELECT * FROM Musique ORDER BY idMusique DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $musiques[] = new Musique($donnees);
        }

        return $musiques;
    }

    /**
     * Permet de modifier les informations d'un Musique
     *
     * @param Musique $musique Musique à supprimer
     * @return boolean
     */
    public function update(Musique $musique)
    {
        $q = $this->_db->prepare('UPDATE Musique SET titreMusique = :titreMusique, datePubMusique = :datePubMusique, imageMusique = :imageMusique, lienMusique = :lienMusique, resumeMusique = :resumeMusique, autreMusique = :autreMusique WHERE idMusique = :idMusique');
        
        $q->bindValue(':titreMusique', $musique->titreMusique(), PDO::PARAM_INT);
        $q->bindValue(':datePubMusique', $musique->datePubMusique(), PDO::PARAM_INT);
        $q->bindValue(':imageMusique', $musique->imageMusique(), PDO::PARAM_INT);
        $q->bindValue(':lienMusique', $musique->lienMusique(), PDO::PARAM_INT);
        $q->bindValue(':resumeMusique', $musique->resumeMusique(), PDO::PARAM_INT);
        $q->bindValue(':idMusique', $musique->idMusique(), PDO::PARAM_INT);
        $q->bindValue(':autreMusique', $musique->autreMusique(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>