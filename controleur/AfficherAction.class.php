<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/LivreDAO.class.php');
require_once('./modele/classes/ListeLivre.class.php');
require_once('./modele/classes/Livre.class.php');
class AfficherAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connect"]))	//utilisateur non connect�.
			return "login";
              
			$taillePage =4;
			$dao = new LivreDAO();
                        $liste=Array();
			$liste = $dao->findAll();
			$nbResultats =$liste->size();
			
			$_SESSION["navig"] = array();
			$_SESSION["navig"]["nbResultats"] = $nbResultats;
			$_SESSION["navig"]["taillePage"] = 4;
            $_SESSION["navig"]["nbPages"] = (int)(($_SESSION["navig"]["nbResultats"]-1)/$taillePage)+1;
		
		return "afficher";
	}
}
?>