<?php

class Film_realisateurManager extends Film_realisateur {

    private $_db;
    private $_film_realisateurArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFilm_realisateur() {
        try {
            $query = "select * from film_realisateur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_realisateurArray[] = new Film_realisateur($data);
        }

        return $_film_realisateurArray;
    }

    public function addFilm_realisateur(array $data) {
        //var_dump($data);
        $query = "select add_film_realisateur(:idfilm,:idpersonne) as retour";
        try {
            $id=null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['idfilm'], PDO::PARAM_INT);
            $statement->bindValue(2, $data['idpersonne'], PDO::PARAM_INT);
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
