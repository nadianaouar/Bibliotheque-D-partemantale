<?php
require_once('./controleur/Action.interface.php');

class AjoutExemplaireAction implements Action {

    public function execute() {
        if (!ISSET($_SESSION))
            session_start();
        if (!ISSET($_SESSION["connect"])) //utilisateur non connect�.
            return "login";


        if ($_REQUEST["numAjouter"]) {

            require_once('modele/classes/user.class.php');
            require_once('modele/userDAO.class.php');
            require_once('modele/classes/Exemplaire.class.php');
            require_once('modele/ExemplaireDAO.class.php');
            $daoExp = new ExemplaireDAO();
            $exemplaire = new Exemplaire();

            $ID = $_SESSION["connect"];
            $daoUser = new UserDAO();
            $user = new User();

            $user1 = $daoUser->find($ID);
            if (($user1->getTypeUser()) == "Bibliothèque") {
                $nomPrenom = "Bibliothèque";
            }
            if (($user1->getTypeUser()) == "Département Informatique") {
                $nomPrenom = "Département Informatique";
            }
            if (($user1->getTypeUser()) == "Professeur") {
                $nomPrenom = $user1->getNom() . " " . $user1->getPrenom();
            }
            //echo 'nom' . $nomPrenom;
            $exemplaire->setProprietaire($nomPrenom);
            $exemplaire->setEmail_Proprietaire($_SESSION['connect']);
            $exemplaire->setIsbn_livre($_REQUEST["numAjouter"]);
            //echo 'isbn' . $_REQUEST["numAjouter"];
            $daoExp->create($exemplaire);
            $_REQUEST["messages"]["succés"] = "Exemplaire a été ajouté avec succés";
        }
        return "rechercher";
    }

}
?>