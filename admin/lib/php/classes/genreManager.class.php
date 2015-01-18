<?php

class GenreManager extends Genre {

    private $_db;
    private $_genreArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeGenre() {
        try {
            $query = "select * from genre order by nomgenre";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_genreArray[] = new Genre($data);
        }

        return $_genreArray;
    }

    public function addGenre(array $data) {
        //var_dump($data);
        $query = "select add_genre(:nomgenre) as retour";
        try {
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['nomgenre'], PDO::PARAM_STR);
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
