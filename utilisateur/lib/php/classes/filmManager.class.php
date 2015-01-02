<?php

class FilmManager extends Film {

    private $_db;
    private $_filmArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFilm() {
        try {
            $query = "select * from film";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_filmArray[] = new Film($data);
        }

        return $_filmArray;
    }

    public function addFilm(array $data) {
        //var_dump($data);
        $query = "select add_film(:titrefilm,:annee,:duree,:synopsis,:note,:definition,:urlimdb,:image) as retour";
        try {
            $id=null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['titrefilm'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['annee'], PDO::PARAM_INT);
            $statement->bindValue(3, $data['duree'], PDO::PARAM_INT);
            $statement->bindValue(4, $data['synopsis'], PDO::PARAM_TEXT);
            $statement->bindValue(5, $data['note'], PDO::PARAM_INT);
            $statement->bindValue(6, $data['definition'], PDO::PARAM_STR);
            $statement->bindValue(7, $data['urlimdb'], PDO::PARAM_STR);
            $statement->bindValue(8, $data['image'], PDO::PARAM_STR);
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
