<?php
//<>
/**
 * Implémentation la classe Musique
 */
Class Musique{

    // déclaration des attributs
    private $idMusique;
    private $idArtiste;
    private $titreMusique;
    private $dateAjoutMusique;
    private $datePubMusique;
    private $imageMusique;
    private $lienMusique;
    private $resumeMusique;
    private $autreMusique;

    // getteurs
    public function idMusique(){
        return $this->idMusique;
    }
    public function idArtiste(){
        return $this->idArtiste;
    }
    public function titreMusique(){
        return $this->titreMusique;
    }
    public function dateAjoutMusique(){
        return $this->dateAjoutMusique;
    }
    public function datePubMusique(){
        return $this->datePubMusique;
    }
    public function imageMusique(){
        return $this->imageMusique;
    }
    public function lienMusique(){
        return $this->lienMusique;
    }
    public function resumeMusique(){
        return $this->resumeMusique;
    }
    public function autreMusique(){
        return $this->autreMusique;
    }

    //setteurs
    public function setIdMusique($idMusique){
        $this->idMusique = $idMusique;
    }
    public function setIdArtiste($idArtiste){
        $this->idArtiste = $idArtiste;
    }
    public function setTitreMusique($titreMusique){
        $this->titreMusique = $titreMusique;
    }
    public function setDateAjoutMusique($dateAjoutMusique){
        $this->dateAjoutMusique = $dateAjoutMusique;
    }
    public function setDatePubMusique($datePubMusique){
        $this->datePubMusique = $datePubMusique;
    }
    public function setImageMusique($imageMusique){
        $this->imageMusique = $imageMusique;
    }
    public function setLienMusique($lienMusique){
        $this->lienMusique = $lienMusique;
    }
    public function setResumeMusique($resumeMusique){
        $this->resumeMusique = $resumeMusique;
    }
    public function setAutreMusique($autreMusique){
        $this->autreMusique = $autreMusique;
    }

    /**
     * Permet d'hydrater les données de l'Musique
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