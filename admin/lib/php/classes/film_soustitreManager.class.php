<?php

class Film_soustitreManager extends Film_soustitre {

    private $_db;
    private $_film_soustitreArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFilm_soustitre() {
        try {
            $query = "select * from film_soustitre";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_soustitreArray[] = new Film-soustitre($data);
        }

        return $_film_soustitreArray;
    }

    public function addFilm_soustitre(array $data) {
        //var_dump($data);
        $query = "select add_film_soustitre(:idfilm,:idlangue) as retour";
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
