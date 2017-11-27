<?php
include_once('/modele/classes/Database.class.php');
include_once('/modele/classes/Livre.class.php');
include_once('./modele/classes/ListeLivre.class.php');

class LivreDAO {

    public function create($l) {
        $db = Database::getInstance();
        $request = "INSERT INTO livre (ISBN ,TITRE_LIVRE,DESCRIPTION,EDITION,AUTEUR,ANNEE,LANGUE,NOMIMG,MOTS_CLES)" .
                " VALUES ('" . $l->getIsbn() . "','" . $l->getTitre_livre() . "','" . $l->getDescription() . "','" . $l->getEdition() . "','" . $l->getAuteur() . "','" . $l->getAnnee() . "','" . $l->getLangue() . "','" . $l->getNomimg() . "','" . $l->getMots_cles() . "')";
        try {

            return $db->exec($request);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function findAll() {
        try {
            
            $liste = new ListeLivre();
            $requete = 'SELECT * FROM livre';
            $cnx = Database::getInstance();

            $res = $cnx->query($requete);
            foreach ($res as $row) {
                $p = new Livre();
                $p->loadFromRecord($row);
                $liste->add($p);
            }
            $res->closeCursor();
            $cnx = null;
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $livre;
        }
    }

    public static function find($id) {
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT * FROM livre WHERE ISBN = :x");
        $pstmt->execute(array(':x' => $id));

        $result = $pstmt->fetch(PDO::FETCH_OBJ);


        if ($result) {
            $l = new Livre();
            $l->loadFromObject($result);
            return $l;
        }
        $pstmt->closeCursor();
        return null;
    }

    public static function findMot($Listemots) {
        $cnx = Database::getInstance();
        try {

            $where = "";
            $motsCles = preg_split("/[\s,]+/", $Listemots);
            $count_mots = count($motsCles);
            if ($count_mots > 1) {
                foreach ($motsCles as $key => $mot) {


                    $where .= "TITRE_LIVRE LIKE '%$mot%' or  MOTS_CLES LIKE '%$mot%' or AUTEUR LIKE '%$mot%'";
                    if ($key != ($count_mots - 1)) {

                        $where .= " or ";
                    }
                }

                $requete = "SELECT * FROM livre WHERE $where";
            } else {

                $requete = "SELECT * FROM livre WHERE TITRE_LIVRE LIKE '%$Listemots%' or  MOTS_CLES LIKE '%$Listemots%' or AUTEUR LIKE '%$Listemots%'";
            }
            print_r($requete);
            $livre = Array();
            $res = $cnx->query($requete);
            if ($res) {
                foreach ($res as $row) {
                    $l = new Livre();
                    $l->loadFromRecord($row);
                    array_push($livre, $l);
                }
            }

            $cnx = null;
            return $livre;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $livre;
        }
    }

    public function update($x) {
        $request = "UPDATE livre SET DESCRIPTION = '" . $x->getDescription() . "', MOTS_CLES = '" . $x->getMots_cles() . "', TITRE_LIVRE='" . $x->getTitre_livre() . "'" .
                " WHERE ISBN= '" . $x->getIsbn() . "'";






        try {
            $db = Database::getInstance();
            return $db->exec($request);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function getPage($numPage, $taillePage) {
        try {
            $liste = new ListeLivre();

            $debut = ($numPage - 1) * $taillePage;

            $requete = 'SELECT * FROM livre LIMIT ' . $debut . ', ' . $taillePage;
            $cnx = Database::getInstance();

            $res = $cnx->query($requete);
            foreach ($res as $row) {
                $p = new Livre();
                $p->loadFromRecord($row);
                $liste->add($p);
            }
            $res->closeCursor();
            $cnx = null;
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $liste;
        }
    }

}
?>