<?php

class Film_paysManager extends Film_pays {

    private $_db;
    private $_film_paysArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFilm_pays() {
        try {
            $query = "select * from film_pays";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_paysArray[] = new Film_pays($data);
        }

        return $_filmArray;
    }

    public function getFilm_pays($choix) {
        try {
            $query = "select * from film_pays where idfilm =:idfilm";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $choix, PDO::PARAM_INT);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_paysArray[] = new Film_pays($data);
        }
        if (isset($_film_paysArray))
            return $_film_paysArray;
        else
            return 0;
    }

    public function addFilm_pays(array $data) {
        //var_dump($data);
        $query = "select add_film_pays(:idfilm,:idpays) as retour";
        try {
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['idfilm'], PDO::PARAM_INT);
            $statement->bindValue(2, $data['idpays'], PDO::PARAM_INT);
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
