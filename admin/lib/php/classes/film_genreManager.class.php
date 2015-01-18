<?php

class Film_genreManager extends Film_genre {

    private $_db;
    private $_film_genreArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFilm_genre() {
        try {
            $query = "select * from film_genre";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_genreArray[] = new Film_genre($data);
        }

        return $_film_genreArray;
    }

    public function getFilm_genres($choix) {
        try {
            $query = "select * from film_genre where idfilm =:idfilm";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $choix, PDO::PARAM_INT);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_film_genreArray[] = new Film_genre($data);
        }
        if (isset($_film_genreArray))
            return $_film_genreArray;
        else
            return 0;
    }

    public function addFilm_genre(array $data) {
        //var_dump($data);
        $query = "select add_film_genre(:idgenre,:idfilm) as retour";
        try {
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['idgenre'], PDO::PARAM_INT);
            $statement->bindValue(2, $data['idfilm'], PDO::PARAM_INT);
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
