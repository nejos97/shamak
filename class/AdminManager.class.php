<?php

require_once __DIR__."\Admin.class.php";

/**
 * Manager de la classe Admin
 */
Class AdminManager{

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
     * Permet d'insérer un administrateur dans la BD
     *
     * @param Admin $admin Administrateur à ajouter
     * @return int
     */
    public function add(Admin $admin)
    {
        $q = $this->_db->prepare('INSERT INTO Admin(nomAdmin, prenomAdmin, sexeAdmin, emailAdmin, mdpAdmin) VALUES(:nomAdmin, :prenomAdmin, :sexeAdmin, :emailAdmin, :mdpAdmin)');

        $q->bindValue(':nomAdmin', $admin->nomAdmin(), PDO::PARAM_INT);
        $q->bindValue(':prenomAdmin', $admin->prenomAdmin(), PDO::PARAM_INT);
        $q->bindValue(':sexeAdmin', $admin->sexeAdmin(), PDO::PARAM_INT);
        $q->bindValue(':emailAdmin', $admin->emailAdmin(), PDO::PARAM_INT);
        $q->bindValue(':mdpAdmin', $admin->mdpAdmin(), PDO::PARAM_INT);

        if($q->execute()){
            $admin->setIdAdmin($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    /**
     * Supprime un adminstrateur
     *
     * @param Admin $admin Objet de l'adminstrateur à supprimer
     * @return void
     */
    public function delete(Admin $admin)
    {
        $this->_db->exec('DELETE FROM Admin WHERE idAdmin = '.$admin->idAdmin());
    }

    /**
     * Retourne l'objet utilisateur
     *
     * @param int $idAdmin id de l'utilisateur
     * @return void
     */
    public function get($idAdmin)
    {

        $q = $this->_db->query('SELECT * FROM Admin WHERE idAdmin = '.(int)$idAdmin);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Admin($donnees);
    }

    /**
     * Retourne tous les utilisateurs de la base de données
     *
     * @return array
     */
    public function getList()
    {
        $admins = [];

        $q = $this->_db->query('SELECT * FROM Admin ORDER BY idAdmin DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $admins[] = new Admin($donnees);
        }

        return $admins;
    }

    /**
     * Permet de modifier les informations d'un utilisateur
     *
     * @param Admin $admin Admin à supprimer
     * @return boolean
     */
    public function update(Admin $admin)
    {
        $q = $this->_db->prepare('UPDATE Admin SET nomAdmin = :nomAdmin, prenomAdmin = :prenomAdmin, sexeAdmin = :sexeAdmin, emailAdmin = :emailAdmin, mdpAdmin = :mdpAdmin WHERE idAdmin = :idAdmin');
        
        $q->bindValue(':nomAdmin', $admin->nomAdmin(), PDO::PARAM_INT);
        $q->bindValue(':prenomAdmin', $admin->prenomAdmin(), PDO::PARAM_INT);
        $q->bindValue(':sexeAdmin', $admin->sexeAdmin(), PDO::PARAM_INT);
        $q->bindValue(':emailAdmin', $admin->emailAdmin(), PDO::PARAM_INT);
        $q->bindValue(':mdpAdmin', $admin->mdpAdmin(), PDO::PARAM_INT);
        $q->bindValue(':idAdmin', $admin->idAdmin(), PDO::PARAM_INT);

        $q->execute();
    }


    public function connexion($email,$mdp){
        $q = $this->_db->prepare('SELECT * FROM Admin WHERE emailAdmin = :emailAdmin AND mdpAdmin=:mdpAdmin ');

        $q->bindValue(':emailAdmin', $email);
        $q->bindValue(':mdpAdmin', $mdp);
        $q->execute();

        $donnees = $q->fetch();
        if ((int)$donnees['idAdmin']>0){
            return (int)$donnees['idAdmin'];
        }
        else{
            return 0;
        }
    }
}
?>