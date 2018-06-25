<?php
//<>
/**
 * Implémentation la classe Film
 */
Class Film{

    // déclaration des attributs
    private $idFilm;
    private $titreFilm;
    private $dateAjoutFilm;
    private $datePubFilm;
    private $imageFilm;
    private $lienFilm;
    private $resumeFilm;

    // getteurs
    public function idFilm(){
        return $this->idFilm;
    }
    public function titreFilm(){
        return $this->titreFilm;
    }
    public function dateAjoutFilm(){
        return $this->dateAjoutFilm;
    }
    public function datePubFilm(){
        return $this->datePubFilm;
    }
    public function imageFilm(){
        return $this->imageFilm;
    }
    public function lienFilm(){
        return $this->lienFilm;
    }
    public function resumeFilm(){
        return $this->resumeFilm;
    }

    //setteurs
    public function setIdFilm($idFilm){
        $this->idFilm = $idFilm;
    }
    public function setTitreFilm($titreFilm){
        $this->titreFilm = $titreFilm;
    }
    public function setDateAjoutFilm($dateAjoutFilm){
        $this->dateAjoutFilm = $dateAjoutFilm;
    }
    public function setDatePubFilm($datePubFilm){
        $this->datePubFilm = $datePubFilm;
    }
    public function setImageFilm($imageFilm){
        $this->imageFilm = $imageFilm;
    }
    public function setLienFilm($lienFilm){
        $this->lienFilm = $lienFilm;
    }
    public function setResumeFilm($resumeFilm){
        $this->resumeFilm = $resumeFilm;
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