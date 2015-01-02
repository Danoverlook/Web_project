<?php

class PersonneManager extends Personne {

    private $_db;
    private $_personneArray = array();

    //$db est un objet créé par l'index
    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListePersonne() {
        try {
            $query = "select * from personne";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_personneArray[] = new Personne($data);
        }

        return $_personneArray;
    }

    public function addPersonne(array $data) {
        //var_dump($data);
        $query = "select add_personne(:nompersonne,:prenompersonne) as retour";
        try {
            $id=null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['nompersonne'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['prenompersonne'], PDO::PARAM_INT);
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
