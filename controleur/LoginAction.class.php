<?php
require_once('./controleur/Action.interface.php');
class LoginAction implements Action {
	public function execute(){
            if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_REQUEST["email"]))
			return "login";
		if (!$this->valide())
		{
			return "login";
		}

		require_once('./modele/UserDAO.class.php');
		$udao = new UserDAO();
		$user = $udao->find($_REQUEST["email"]);
                $typeUser=$user->getTypeUser();
		if ($user == null)
			{
				$_REQUEST["field_messages"]["email"] = "Utilisateur inexistant.";	
				return "login";
			}
		else if ($user->getMotdepasse()!= $_REQUEST["password"])
			{
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				return "login";
			}
		
		$_SESSION["connect"] = $_REQUEST["email"];
                $_SESSION["typeUser"]=$typeUser;
                
		return "afficher";
	}
	public function valide()
	{
		$result = true;
		if ($_REQUEST['email'] == "" || !filter_var($_REQUEST['email'] ,FILTER_VALIDATE_EMAIL))
		{
			$_REQUEST["field_messages"]["email"] = "Email obligatoire";
			$result = false;
		}	
		if ($_REQUEST['password'] == "")
		{
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		}
                
		return $result;
	}
}
?>