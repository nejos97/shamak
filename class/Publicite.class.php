<?php
//<>
/**
 * Implémentation la classe Publicite
 */
Class Publicite{

    // déclaration des attributs
    private $idPublicite;
    private $idEntreprise;
    private $titrePublicite;
    private $dateAjoutPublicite;
    private $datePubPublicite;
    private $imagePublicite;
    private $lienPublicite;
    private $resumePublicite;

    // getteurs
    public function idPublicite(){
        return $this->idPublicite;
    }
    public function idEntreprise(){
        return $this->idEntreprise;
    }
    public function titrePublicite(){
        return $this->titrePublicite;
    }
    public function dateAjoutPublicite(){
        return $this->dateAjoutPublicite;
    }
    public function datePubPublicite(){
        return $this->datePubPublicite;
    }
    public function imagePublicite(){
        return $this->imagePublicite;
    }
    public function lienPublicite(){
        return $this->lienPublicite;
    }
    public function resumePublicite(){
        return $this->resumePublicite;
    }

    //setteurs
    public function setIdPublicite($idPublicite){
        $this->idPublicite = $idPublicite;
    }
    public function setIdEntreprise($idEntreprise){
        $this->idEntreprise = $idEntreprise;
    }
    public function setTitrePublicite($titrePublicite){
        $this->titrePublicite = $titrePublicite;
    }
    public function setDateAjoutPublicite($dateAjoutPublicite){
        $this->dateAjoutPublicite = $dateAjoutPublicite;
    }
    public function setDatePubPublicite($datePubPublicite){
        $this->datePubPublicite = $datePubPublicite;
    }
    public function setImagePublicite($imagePublicite){
        $this->imagePublicite = $imagePublicite;
    }
    public function setLienPublicite($lienPublicite){
        $this->lienPublicite = $lienPublicite;
    }
    public function setResumePublicite($resumePublicite){
        $this->resumePublicite = $resumePublicite;
    }
    /**
     * Permet d'hydrater les données de l'Publicite
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