<?php
//<>
/**
 * Implémentation la classe Artiste
 */
Class Artiste{

    // déclaration des attributs
    private $idArtiste;
    private $nomArtiste;

    // getteurs
    public function idArtiste(){
        return $this->idArtiste;
    }
    public function nomArtiste(){
        return $this->nomArtiste;
    }
    

    //setteurs
    public function setIdArtiste($idArtiste){
        $this->idArtiste = $idArtiste;
    }
    public function setNomArtiste($nomArtiste){
        $this->nomArtiste = $nomArtiste;
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