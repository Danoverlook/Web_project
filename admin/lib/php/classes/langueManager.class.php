<?php

class LangueManager extends Langue {

    private $_db;
    private $_langueArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeLangue() {
        try {
            $query = "select * from langue";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_langueArray[] = new Langue($data);
        }
        if (isset($_langueArray))
            return $_langueArray;
        else
            return 0;
    }

    public function addLangue(array $data) {
        //var_dump($data);
        $query = "select add_langue(:nomlangue) as retour";
        try {
            $id = null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['nomlangue'], PDO::PARAM_STR);
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
