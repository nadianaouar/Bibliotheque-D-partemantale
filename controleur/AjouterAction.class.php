<?php
require_once('./controleur/Action.interface.php');

class AjouterAction implements Action {

    public function execute() {
        if (!ISSET($_SESSION))
            session_start();
        if (!ISSET($_SESSION["connect"]))//utilisateur non connecté
            return "login";
        
        if (ISSET($_REQUEST['ajoutlivre'])) {
            require_once('modele/classes/Livre.class.php');
            require_once('modele/LivreDAO.class.php');
            require_once('modele/classes/Exemplaire.class.php');
            require_once('modele/ExemplaireDAO.class.php');
            require_once('modele/classes/User.class.php');
            require_once('modele/UserDAO.class.php');
    
            $dao = new LivreDAO();
            $livre = new Livre();
            $livre->setIsbn($_REQUEST['isbn']);
            $livre->setTitre_livre($_REQUEST['titre']);
            $livre->setDescription($_REQUEST['description']);
            $livre->setAuteur($_REQUEST['auteur']);
            $livre->setAnnee($_REQUEST['annee']);
            $livre->setEdition($_REQUEST['edition']);
            $livre->setLangue($_REQUEST['langue']);
            //echo $_REQUEST['description'];
            //echo $_REQUEST['auteur'];
              

            $nomPhoto = $_FILES['nomimg']['name'];
            $fichierT = $_FILES['nomimg']['tmp_name'];
            move_uploaded_file($fichierT, 'imageProjetNadia/' . $nomPhoto);
            $livre->setNomimg($nomPhoto);
            $livre->setMots_cles($_REQUEST['motscles']);
            
            $res = $dao->find($livre->getIsbn());
          if ($res) {
               $_REQUEST["messages"]["ErreurLivre"] = "Livre existe deja avec cet ISBN";
            }
           else 
               {
                $dao->create($livre);
                $daoExp = new ExemplaireDAO();
                $exemplaire = new Exemplaire();

                $ID = $_SESSION["connect"];
                $daoUser = new UserDAO();
                $user = new User();

                $user1 = $daoUser->find($ID);
                if (($user1->getTypeUser()) == "Bibliothèque") {
                    $nomPrenom = "Bibliothèque";
                }
                if (($user1->getTypeUser()) == "Département Informatique") {
                    $nomPrenom = "Département Informatique";
                }
                if (($user1->getTypeUser()) == "Professeur") {
                    $nomPrenom = $user1->getNom() . " " . $user1->getPrenom();
                }

                $exemplaire->setProprietaire($nomPrenom);
                 $exemplaire->setEmail_Proprietaire($ID);
                $exemplaire->setIsbn_livre($_REQUEST['isbn']);
                //echo $_REQUEST['isbn'];

             
                $daoExp->create($exemplaire);
                $_REQUEST["messages"]["succésLivre"] = "Livre a été ajouté avec succés";
                $_REQUEST["messages"]["succésExemplaire"] = "Exemplaire a été ajouté avec succés";
            }
       }

        return "ajouter";
    }

    public function valide() {
        $result = true;
        if ($_REQUEST['isbn'] == "") {
            $_REQUEST["field_messages"]["isbn"] = "ISBN obligatoire";
            $result = false;
        }
        if ($_REQUEST['titre'] == "") {
            $_REQUEST["field_messages"]["titre"] = "Titre obligatoire";
            $result = false;
        }
        if ($_REQUEST['auteur'] == "") {
            $_REQUEST["field_messages"]["auteur"] = "Auteur obligatoire";
            $result = false;
        }
        if ($_REQUEST['auteur'] == "") {
            $_REQUEST["field_messages"]["auteur"] = "Auteur obligatoire";
            $result = false;
        }
        return $result;
    }

}
?>