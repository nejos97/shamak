<?php
//<>
/**
 * Implémentation la classe Entreprise
 */
Class Entreprise{

    // déclaration des attributs
    private $idEntreprise;
    private $nomEntreprise;

    // getteurs
    public function idEntreprise(){
        return $this->idEntreprise;
    }
    public function nomEntreprise(){
        return $this->nomEntreprise;
    }
    

    //setteurs
    public function setIdEntreprise($idEntreprise){
        $this->idEntreprise = $idEntreprise;
    }
    public function setNomEntreprise($nomEntreprise){
        $this->nomEntreprise = $nomEntreprise;
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