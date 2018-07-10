<?php
require_once "Sugestions.class.php";

Class SugestionsManager{

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
     * Permet d'insérer une sugestion dans la BD
     *
     * @param Sugestions $sugestions Sugestions à ajouter
     * @return int
     */
    public function add(Sugestions $sugestions)
    {
        $q = $this->_db->prepare('INSERT INTO Sugestions(nomSug, emailSug, sujetSug, messageSug) VALUES(:nomSug, :emailSug, :sujetSug, :messageSug)');

        $q->bindValue(':nomSug', $sugestions->nomSug(), PDO::PARAM_INT);
        $q->bindValue(':emailSug', $sugestions->emailSug(), PDO::PARAM_INT);
        $q->bindValue(':sujetSug', $sugestions->sujetSug(), PDO::PARAM_INT);
        $q->bindValue(':messageSug', $sugestions->messageSug(), PDO::PARAM_INT);

        if($q->execute()){
            $sugestions->setIdSug($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un sugestions
     *
     * @param Sugestions $sugestions Objet de l'sugestions à supprimer
     * @return void
     */
    public function delete(Sugestions $sugestions)
    {
        $this->_db->exec('DELETE FROM Sugestions WHERE idSug = '.$sugestions->idSug());
    }

    /**
     * Retourne l'objet sugestions
     *
     * @param int $idSug id de l'sugestions
     * @return void
     */
    public function get($idSug)
    {

        $q = $this->_db->query('SELECT * FROM Sugestions WHERE idSug = '.(int)$idSug);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Sugestions($donnees);
    }

    /**
     * Retourne tous les sugestions de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $sugestions = [];

        $q = $this->_db->query('SELECT * FROM Sugestions ORDER BY idSug DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $sugestions[] = new Sugestions($donnees);
        }

        return $sugestions;
    }

    /**
     * Retourne le nombre de message non lu
     *
     * @return array
     */
    public function getRow()
    {

        $q = $this->_db->query('SELECT * FROM Sugestions WHERE luSug=0');

        return $q->rowCount();
        
    }

    /**
     * Permet de modifier les informations d'un sugestions
     *
     * @param Sugestions $sugestions Sugestions à supprimer
     * @return boolean
     */
    public function update(Sug $sugestions)
    {
        $q = $this->_db->prepare('UPDATE Sugestions SET nomSug = :nomSug, emailSug = :emailSug, sujetSug = :sujetSug, messageSug = :messageSug, dateSug = :dateSug, luSug = :luSug WHERE idSug = :idSug');
        
        $q->bindValue(':nomSug', $sugestions->nomSug(), PDO::PARAM_INT);
        $q->bindValue(':emailSug', $sugestions->emailSug(), PDO::PARAM_INT);
        $q->bindValue(':sujetSug', $sugestions->sujetSug(), PDO::PARAM_INT);
        $q->bindValue(':messageSug', $sugestions->messageSug(), PDO::PARAM_INT);
        $q->bindValue(':dateSug', $sugestions->dateSug(), PDO::PARAM_INT);
        $q->bindValue(':luSug', $sugestions->luSug(), PDO::PARAM_INT);
        $q->bindValue(':idSug', $sugestions->idSug(), PDO::PARAM_INT);

        $q->execute();
    }
}
?>