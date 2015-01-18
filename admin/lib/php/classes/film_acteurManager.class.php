<?php

class Film_acteurManager extends Film_acteur {

    private $_db;
    private $_film_acteurArray = array();

//$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFilm_acteur() {
        try {
            $query = "select * from film_acteur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_acteurArray[] = new Film_acteur($data);
        }

        return $_film_acteurArray;
    }

    public function getFilm_acteurs($choix) {
        try {
            $query = "select * from film_acteur where idfilm =:idfilm";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $choix, PDO::PARAM_INT);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_acteurArray[] = new Film_acteur($data);
        }
        if (isset($_film_acteurArray))
            return $_film_acteurArray;
        else
            return 0;
    }

    public function addFilm_acteur(array $data) {
//var_dump($data);
        $query = "select add_film_acteur(:idfilm,:idpersonne) as retour";
        try {
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
