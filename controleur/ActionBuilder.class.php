<?php

require_once('./controleur/AfficherAction.class.php');
require_once('./controleur/LoginAction.class.php');
require_once('./controleur/LogoutAction.class.php');
require_once('./controleur/RechercheAction.class.php');
require_once('./controleur/AjouterAction.class.php');
require_once('./controleur/ModifierAction.class.php');
require_once('./controleur/ListeExpAction.class.php');
require_once('./controleur/AjoutExemplaireAction.class.php');
require_once('./controleur/InscriptionAction.class.php');
require_once('./controleur/AfficheLivreEvalueAction.class.php');
require_once('./controleur/EvaluerAction.class.php');
require_once('./controleur/EmprunterAction.class.php');
require_once('./controleur/FormulaireEmailAction.class.php');
require_once('./controleur/afficherLivreAction.class.php');
require_once('./controleur/SupprimerLivreAction.class.php');
require_once('./controleur/EnvoyerAction.class.php');
require_once('./controleur/ChangerDetenteurAction.class.php');
class ActionBuilder{
	public static function getAction($nomAction){
		switch ($nomAction)
		{
			case "connecter" :
				return new LoginAction();
			break; 
			case "deconnecter" :
				return new LogoutAction();
			break; 
			case "afficher" :
				return new AfficherAction();
			break; 
                        case "chercher" :
				return new RechercheAction();
			break; 
                        case "ajouter" :
				return new AjouterAction();
			break;
                        case "modifier" :
				return new ModifierAction();
			break;
                        case "afficheExp" :
				return new ListeExpAction();
			break;
                        case "changerDet" :
				return new ChangerDetenteurAction();
			break;
                        case "supprimer" :
				return new SupprimerLivreAction();
			break;
                        case "binscription" :
				return new InscriptionAction();
			break;
                        case "inscription" :
				return new InscriptionAction();
			break;
                       case "ajouterExp" :
				return new AjoutExemplaireAction();
			break;
                        case "afficheLivreEvalue" :
				return new AfficheLivreEvalueAction();
			break;
                        case "formulaireEmail" :
				return new FormulaireEmailAction();
			break;
                      case "envoyer" :
				return new EnvoyerAction();
			break;
                        case "evaluer" :
				return new EvaluerAction();
			break;
                        case "default" :
				return new DefaultAction();
			break;
                        case "afficherLivre" :
				return new afficherLivreAction();
			break;
                        case "emprunter" :
				return new EmprunterAction();
			break;
			default :
				//return new DefaultAction();
                         return new AfficherAction();
		}
	}
}
?>
