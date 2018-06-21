<?php
/**
 * Implémentation la classe Utilisateur
 */
Class Admin{

    /**
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

    public function idAdmin(){
        return (int)$this->idAdmin;
    }
    public function nomAdmin(){
        return $this->nomAdmin;
    }
    public function prenomAdmin(){
        return $this->prenomAdmin;
    }
    public function sexeAdmin(){
        return $this->sexeAdmin;
    }
    public function emailAdmin(){
        return $this->emailAdmin;
    }
    public function mdpAdmin(){
        return $this->mdpAdmin;
    }

    //setteurs
    public function setIdAdmin($idAdmin){
        $this->idAdmin = $idAdmin;
    }
    public function setNomAdmin($nomAdmin){
        $this->nomAdmin = $nomAdmin;
    }
    public function setPrenomAdmin($prenomAdmin){
        $this->prenomAdmin = $prenomAdmin;
    }
    public function setSexeAdmin($sexeAdmin){
        $this->sexeAdmin = $sexeAdmin;
    }
    public function setEmailAdmin($emailAdmin){
        $this->emailAdmin = $emailAdmin;
    }
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