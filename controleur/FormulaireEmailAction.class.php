<?php
require_once('./controleur/Action.interface.php');
class FormulaireEmailAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
	        if (!ISSET($_SESSION["connect"]))
		return "login";
	
                return "envoi";
	}
}
?>