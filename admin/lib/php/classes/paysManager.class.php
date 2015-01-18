<?php

class PaysManager extends Pays {

    private $_db;
    private $_paysArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListePays() {
        try {
            $query = "select * from pays";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_paysArray[] = new Pays($data);
        }

        return $_paysArray;
    }

    public function addPays(array $data) {
        //var_dump($data);
        $query = "select add_pays(:nompays) as retour";
        try {
            $id=null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['nompays'], PDO::PARAM_STR);
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
