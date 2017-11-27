<?php

require_once('./controleur/Action.interface.php');
require_once('./modele/classes/Exemplaire.class.php');
require_once('./modele/ExemplaireDAO.class.php');
require_once('./modele/classes/User.class.php');
require_once('./modele/UserDAO.class.php');
require_once('./controleur/RequirePRGAction.interface.php');

class SupprimerLivreAction implements Action, RequirePRGAction {

    public function execute() {
        if (!ISSET($_SESSION))
            session_start();
        if (!ISSET($_SESSION["connect"])) //utilisateur non connect�.
            return "login";

        if (isset($_REQUEST["codeExpSup"])) { //echo  $_REQUEST["proprietaire"];
            if (($_REQUEST['detenteur']) != NULL) {
                $_REQUEST["messages"]["supprimer"] = 'on ne peut pas supprimer un Livre emprunté';
            } else {
                if (isset($_REQUEST["proprietaire"])) { //echo $_REQUEST['emailproprietaire'];
                    if (($_SESSION['typeUser'] == $_REQUEST["proprietaire"]) or ( $_REQUEST['emailproprietaire'] == $_SESSION['connect'])) {
                        $daoExp = new ExemplaireDAO();
                        $l = new Exemplaire();
                        $l->setCode_exp($_REQUEST["codeExpSup"]);
                        $daoExp->delete($l);

                        $_REQUEST["messages"]["suppression"] = "Suppression de livre réussie";
                    } else
                        $_REQUEST["messages"]["suppressionInterdit"] = "Vous n'avez pas le droit de supprimer cet livre";
                }
            }
        }
        return "rechercher";
    }

}

?>