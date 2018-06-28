<?php
//<>
/**
<<<<<<< HEAD
 * Implémentation la classe Entreprise
=======
 * Implémentation la classe Artiste
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
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
<<<<<<< HEAD
    
=======

>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f

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
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 0a106d2580414af4b9c712bcab5fb294b4e3455f
