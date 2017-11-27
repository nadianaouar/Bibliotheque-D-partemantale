<?php
require_once('./controleur/Action.interface.php');
 require_once('modele/classes/Exemplaire.class.php');
 require_once('modele/ExemplaireDAO.class.php');
class EmprunterAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connect"]))	//utilisateur non connect�.
			return "login";
                   
                    if(isset($_REQUEST['numEXP'] )){
                        
                          $dao = new ExemplaireDAO();
                          $exemplaire=new Exemplaire();
                          $exemplaire->setCode_exp($_REQUEST['numEXP']);
                          $exemplaire->setDetenteur($_SESSION["connect"]);
                          $exemplaire->setProprietaire($_REQUEST['numprop']);
                          $exemplaire->setEmail_det($_SESSION["connect"]);
                         $exemplaire->setIsbn_livre($_REQUEST['isbnl']);
                          $dao->update($exemplaire);
                        
                    }
              
          	return "rechercher";
	}
}
?>