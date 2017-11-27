<?php
require_once('./controleur/Action.interface.php');
class AfficheLivreEvalueAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connect"]))	//utilisateur non connect�.
			return "login";
		return "afficheLivre";
	}
}
?>