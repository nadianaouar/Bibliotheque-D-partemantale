<?php
include_once('/modele/classes/Database.class.php');
include_once('/modele/classes/Evaluation.class.php');

class EvaluationDAO {

    public function create($ev) {
        $request = "INSERT INTO evaluation (CODE_COURS,EMAIL,ISBN,DESC_EVALUATION,NOTE)" .
                " VALUES ('" . $ev->getE_codecours() . "','" . $ev->getE_email() . "','" . $ev->getE_isbn() . "','" . $ev->getE_descEvaluation() . "','" . $ev->getE_Note() . "')";
        try {
            $db = Database::getInstance();
            return $db->exec($request);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function find($c1) {
        try {
            $livres = Array();
            $requete = "SELECT * FROM evaluation WHERE CODE_COURS = '$c1'";
            $cnx = Database::getInstance();

            $res = $cnx->query($requete);
            foreach ($res as $row) {
                $l = new Evaluation();
                $l->loadFromRecordEval($row);
                array_push($livres, $l);
            }
            $res->closeCursor();
            $cnx = null;
            return $livres;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $livres;
        }
    }

    public static function findIsbn($isbn) {
        try {
            $livres = Array();
            $requete = "SELECT * FROM evaluation WHERE ISBN = '$isbn'";
            $cnx = Database::getInstance();

            $res = $cnx->query($requete);
            foreach ($res as $row) {
                $l = new Evaluation();
                $l->loadFromRecordEval($row);
                array_push($livres, $l);
            }
            $res->closeCursor();
            $cnx = null;
            return $livres;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $livres;
        }
    }

    public static function findAll() {
        try {

            $cours = Array();
            $requete = 'SELECT  * FROM evaluation';
            $cnx = Database::getInstance();

            $res = $cnx->query($requete);
            foreach ($res as $row) {
                $c = new Evaluation();
                $c->loadFromRecordEval($row);
                array_push($cours, $c);
            }
            $res->closeCursor();
            $cnx = null;
            return $cours;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $cours;
        }
    }

}
