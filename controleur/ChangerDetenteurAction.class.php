<?php

require_once('./controleur/Action.interface.php');
require_once('./modele/classes/Exemplaire.class.php');
require_once('/modele/ExemplaireDAO.class.php');


class ChangerDetenteurAction implements Action {

    public function execute() {
        if (!ISSET($_SESSION))
            session_start();
        if (!ISSET($_SESSION["connect"])) //utilisateur non connect�.
            return "login";
        $dao=new ExemplaireDAO();
        if (isset($_REQUEST['numR'])) {
            $exemplaire = new Exemplaire();
            $exemplaire->setCode_exp($_REQUEST["numR"]);
             $exemplaire->setDetenteur('NULL');

            $dao->update($exemplaire);
        }





        return "rechercher";
       
    }

}

?>