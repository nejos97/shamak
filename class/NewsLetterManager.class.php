<?php
require_once "NewsLetter.class.php";
Class NewsLetterManager
{
    /**
     * Instance de PDO
     *
     * @var PDO
     */
    private $_db;
    
    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(NewsLetter $newsLetter)
    {
        
        $q = $this->_db->prepare('INSERT INTO NewsLetter(emailNewsLetter) VALUES(:emailNewsLetter)');

        //$date = date("Y/m/d H:i:s");
        $q->bindValue(':emailNewsLetter', $newsLetter->emailNewsLetter(), PDO::PARAM_INT);

        if($q->execute()){
            $newsLetter->setEmailNewsLetter($this->_db->lastInsertId());
            return $this->_db->lastInsertId();
        }
    }

    public function block(NewsLetter $newsLetter)
    {
        return $this->_db->exec('UPDATE NewsLetter SET statut="false" WHERE emailNewsLetter = '.$newsLetter->emailNewsLetter());
    }

    public function unblock(NewsLetter $newsLetter)
    {
        return $this->_db->exec('UPDATE NewsLetter SET statut="true" WHERE emailNewsLetter = '.$newsLetter->emailNewsLetter());
    }

    public function get($emailNewsLetter)
    {
        $emailNewsLetter = (string) $emailNewsLetter;

        $q = $this->_db->query('SELECT * FROM NewsLetter WHERE emailNewsLetter = "'.$emailNewsLetter.'" LIMIT 1');
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        if(!$donnees)
            return new NewsLetter(array());
        else
            return new NewsLetter($donnees);
    }

    public function getArray($emailNewsLetter)
    {
        $emailNewsLetter = (string) $emailNewsLetter;

        $q = $this->_db->query('SELECT * FROM NewsLetter WHERE emailNewsLetter = '.$emailNewsLetter);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return $donnees;
    }

    public function getList()
    {
        $newsLetters = [];

        $q = $this->_db->query('SELECT * FROM NewsLetter ORDER BY emailNewsLetter');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $newsLetters[] = new NewsLetter($donnees);
        }

        return $newsLetters;
    }

    public function update(NewsLetter $newsLetter)
    {
        $q = $this->_db->prepare('UPDATE NewsLetter SET statut = :statut WHERE emailNewsLetter = :emailNewsLetter');

        $q->bindValue(':statut', $newsLetter->statut(), PDO::PARAM_INT);
        $q->bindValue(':emailNewsLetter', $newsLetter->emailNewsLetter(), PDO::PARAM_INT);

        $q->execute();
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}