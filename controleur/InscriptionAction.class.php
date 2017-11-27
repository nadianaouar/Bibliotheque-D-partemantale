<?php

require_once('./controleur/Action.interface.php');
include_once('modele/classes/Database.class.php');

class InscriptionAction implements Action {

    public function execute() {
        if (!ISSET($_SESSION))
            session_start();

        if (isset($_REQUEST["inscription"])) {
            require_once('modele/classes/User.class.php');
            require_once('modele/UserDAO.class.php');
            require_once('/modele/configs/config.php');

            $email = $_REQUEST["email"];
            
            $nom = $_REQUEST['nom'];
            $prenom = $_REQUEST['prenom'];
            $cle = $_REQUEST['cle'];
            $p1 = $_REQUEST['password'];
            $p2 = $_REQUEST['confirmpassword'];
            $telephone = $_REQUEST['telephone'];
            $resultat = TRUE;

            if ($email == "") {
                $_REQUEST["messages"]["email"] = "Courriel obligatoire";
                $resultat = FALSE;
            }
            if ($nom == "") {
                $_REQUEST["messages"]["nom"] = "Nom obligatoire";
                $resultat = FALSE;
            }
            if (!preg_match('/^[a-zA-Z_]+$/', $nom)) {
                $_REQUEST["messages"]["nom1"] = "Nom doit etre alphabetique";
                $resultat = FALSE;
            }
            if ($prenom == "") {
                $_REQUEST["messages"]["prenom"] = "Prenom obligatoire";
                $resultat = FALSE;
            }
            if (!preg_match('/^[a-zA-Z_]+$/', $nom)) {
                $_REQUEST["messages"]["prenom1"] = "Prenom doit etre alphabetique";
                $resultat = FALSE;
            }

            if ($cle != Config::DB_CLE) {
                $_REQUEST["messages"]["cle"] = "la cle saisi est incorrect";
                $resultat = FALSE;
            }
            if ($p1 == "") {
                $_REQUEST["messages"]["p1"] = "Mot de passe obligatoire";
                $resultat = FALSE;
            }
            if ($p1 != $p2) {
                $_REQUEST["messages"]["p2"] = "Les mots de passe doivent être identiques";
                $resultat = FALSE;
            }


            if ($resultat) {

                $dao = new UserDAO();
                $res = $dao->find($email);
                if ($res) {
                    $_REQUEST["messages"]["existUser"] = "Utilisateur existe déja";
                } else {
                    $user = new User();
                    $user->setNom($nom);
                    $user->setPrenom($prenom);
                    $user->setEmail($email);
                    $user->setCle($cle);
                    $user->setMotdepasse($p1);
                    $user->setTelephone($_REQUEST["telephone"]);
                    //si la personne inscrit est le responsable de la bibliotheque   
                    if (isset($_REQUEST['typeUser']) == "﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿Bibliothèque") {
                        $user->setTypeUser($_REQUEST['typeUser']);
                        //echo $_REQUEST['typeUser'];
                    }
                    //si la personne inscrit est le responsable du departement informatique
                    if (isset($_REQUEST['typeUser']) == "﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿Département Informatique") {
                        $user->setTypeUser($_REQUEST['typeUser']);
                        //echo $_REQUEST['typeUser'];
                    }
                    //si la personne inscrit est un professeur 
                    if (isset($_REQUEST['typeUser']) == "﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿Professeur") {
                        $user->setTypeUser($_REQUEST['typeUser']);
                        //echo $_REQUEST['typeUser'];
                    }

                    //$dao = new UserDAO();
                    $dao->createUser($user);
                    $_SESSION["connect"] = $_REQUEST["email"];
                    $_SESSION["typeUser"]=$_REQUEST['typeUser'];
                 return "afficher";
                }
                   
            }
            
        }
return "inscription";
       
    }

}
