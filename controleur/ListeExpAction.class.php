<?php

require_once('./controleur/Action.interface.php');
class ListeExpAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connect"]))	//utilisateur non connect�.
			return "login";
		return "afficheExp";
	}
}
?>
