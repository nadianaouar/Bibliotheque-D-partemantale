<?php

require_once('./controleur/Action.interface.php');
require_once('modele/classes/Livre.class.php');
require_once('modele/LivreDAO.class.php');

class RechercheAction implements Action {

    public function execute() {
        if (!ISSET($_SESSION))
            session_start();
        if (!ISSET($_SESSION["connect"])) //utilisateur non connect�.
            return "login";

        return "rechercher";
    }

}

?>