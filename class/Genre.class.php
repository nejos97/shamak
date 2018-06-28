<?php
//<>
/**
 * Implémentation la classe Genre
 */
Class Genre{

    // déclaration des attributs
    private $idGenre;
    private $nomGenre;

    // getteurs
    public function idGenre(){
        return $this->idGenre;
    }
    public function nomGenre(){
        return $this->nomGenre;
    }
    

    //setteurs
    public function setIdGenre($idGenre){
        $this->idGenre = $idGenre;
    }
    public function setNomGenre($nomGenre){
        $this->nomGenre = $nomGenre;
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