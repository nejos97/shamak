<?php
//<>
/**
 * Implémentation la classe Sugestions
 */
Class Sugestions{

    // déclaration des attributs
    private $idSug;
    private $nomSug;
    private $emailSug;
    private $sujetSug;
    private $messageSug;
    private $dateSug;
    private $luSug;

    // getteurs
    public function idSug(){
        return $this->idSug;
    }
    public function nomSug(){
        return $this->nomSug;
    }
    public function emailSug(){
        return $this->emailSug;
    }
    public function sujetSug(){
        return $this->sujetSug;
    }
    public function messageSug(){
        return $this->messageSug;
    }
    public function dateSug(){
        return $this->dateSug;
    }
    public function luSug(){
        return $this->luSug;
    }

    //setteurs
    public function setIdSug($idSug){
        $this->idSug = $idSug;
    }
    public function setNomSug($nomSug){
        $this->nomSug = $nomSug;
    }
    public function setEmailSug($emailSug){
        $this->emailSug = $emailSug;
    }
    public function setSujetSug($sujetSug){
        $this->sujetSug = $sujetSug;
    }
    public function setMessageSug($messageSug){
        $this->messageSug = $messageSug;
    }
    public function setDateSug($dateSug){
        $this->dateSug = $dateSug;
    }
    public function setLuSug($luSug){
        $this->luSug = $luSug;
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