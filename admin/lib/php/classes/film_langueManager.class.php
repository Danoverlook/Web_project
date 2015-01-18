<?php

class Film_langueManager extends Film_langue {

    private $_db;
    private $_film_langueArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFilm_langue() {
        try {
            $query = "select * from film_langue";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_langueArray[] = new Film_langue($data);
        }

        return $_film_langueArray;
    }

    public function addFilm_langue(array $data) {
        //var_dump($data);
        $query = "select add_film_langue(:idfilm,:idlangue) as retour";
        try {
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['idfilm'], PDO::PARAM_INT);
            $statement->bindValue(2, $data['idlangue'], PDO::PARAM_INT);
            $statement->execute();
            
            $retour = $statement->fetchColumn(0);
            
            return $retour;
            
        } catch (PDOException $e) {
            print "Echec de l'insertion : " . $e;
            $retour = 0;
            return $retour;
        }
    }

}
