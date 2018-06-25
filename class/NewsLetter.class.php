<?php

/**
 * Class NewsLetter
 * IMplement NewsLetterModel
 */
Class NewsLetter {
    /**
     * NewsLetter's identifiant
     *
     * @var string
     */
    private $emailNewsLetter;
    /**
     * NewsLetter's name
     *
     * @var boolean
     */
    private $statut;
    
    //getteurs

    /**
     * get emailNewsLetter
     *
     * @return string
     */
    public function emailNewsLetter(){
        return $this->emailNewsLetter;
    }
    /**
     * get statut
     *
     * @return boolean
     */
    public function statut(){
        return $this->statut;
    }

    //setteurs
    public function setEmailNewsLetter($emailNewsLetter){
        $this->emailNewsLetter = $emailNewsLetter;
    }
    public function setStatut($statut){
        $this->statut = $statut;
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
    /**
     * Constructeur
     *
     * @param array $donnees
     */
    public function __construct($donnees){
        $this->hydrate($donnees);
    }

}
?>