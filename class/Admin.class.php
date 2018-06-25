<?php
/**
 * Implémentation la classe Utilisateur
 */
Class Admin{

    /**s
     * Identifiant de l'administrateur
     *
     * @var int
     */
    private $idAdmin;
    /**
     * Nom de l'administrateur
     *
     * @var string
     */
    private $nomAdmin;
    /**
     * Prénom de l'administrateur
     *
     * @var string
     */
    private $prenomAdmin;
    /**
     * Sexe de l'administrateur
     *
     * @var char
     */
    private $sexeAdmin;
    /**
     * Email de l'administrateur
     *
     * @var string
     */
    private $emailAdmin;
    /**
     * Mot de passe de l'administrateur
     *
     * @var string
     */
    private $mdpAdmin;

    /**
     * Get idAdmin
     *
     * @return int
     */
    public function idAdmin(){
        return (int)$this->idAdmin;
    }

    /**
     * Get nomAdmin
     *
     * @return string
     */
    public function nomAdmin(){
        return $this->nomAdmin;
    }

    /**
     * Get prenomAdmin
     *
     * @return string
     */
    public function prenomAdmin(){
        return $this->prenomAdmin;
    }

    /**
     * Get sexeAdmin
     *
     * @return string
     */
    public function sexeAdmin(){
        return $this->sexeAdmin;
    }

    /**
     * Get emailAdmin
     *
     * @return string
     */
    public function emailAdmin(){
        return $this->emailAdmin;
    }

    /**
     * Get mdpAdmin
     *
     * @return string
     */
    public function mdpAdmin(){
        return $this->mdpAdmin;
    }

    /**
     * set idAdmin
     *
     * @param int $idAdmin
     * @return void
     */
    //setteurs
    public function setIdAdmin($idAdmin){
        $this->idAdmin = $idAdmin;
    }
    /**
     * set NomAdmin
     *
     * @param string $nomAdmin
     * @return void
     */
    public function setNomAdmin($nomAdmin){
        $this->nomAdmin = $nomAdmin;
    }
    /**
     * set prenomAdmin
     *
     * @param string $prenomAdmin
     * @return void
     */
    public function setPrenomAdmin($prenomAdmin){
        $this->prenomAdmin = $prenomAdmin;
    }
    /**
     * set sexeAdmin
     *
     * @param string $sexeAdmin
     * @return void
     */
    public function setSexeAdmin($sexeAdmin){
        $this->sexeAdmin = $sexeAdmin;
    }
    /**
     * set emailAdmin
     *
     * @param string $emailAdmin
     * @return void
     */
    public function setEmailAdmin($emailAdmin){
        $this->emailAdmin = $emailAdmin;
    }
    /**
     * set mdpAdmin
     *
     * @param string $mdpAdmin
     * @return void
     */
    public function setMdpAdmin($mdpAdmin){
        $this->mdpAdmin = $mdpAdmin;
    }
    /**
     * Permet d'hydrater les données de l'utilisateur
     *
     * @param array $donnees
     * @return void
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                // Appel de la méthode du setter
                $this->$method($value);
            }
        }
    }

    public function __construct($array = array()){
        $this->hydrate($array);
    }
}
?>