<?php
//<>
/**
 * Implémentation la classe Acteur
 */
Class Acteur{

    // déclaration des attributs
    private $idActeur;
    private $nomActeur;
    private $prenomActeur;

    // getteurs
    public function idActeur(){
        return $this->idActeur;
    }
    public function nomActeur(){
        return $this->nomActeur;
    }
    public function prenomActeur(){
        return $this->prenomActeur;
    }

    //setteurs
    public function setIdActeur($idActeur){
        $this->idActeur = $idActeur;
    }
    public function setNomActeur($nomActeur){
        $this->nomActeur = $nomActeur;
    }
    public function setPrenomActeur($prenomActeur){
        $this->prenomActeur = $prenomActeur;
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