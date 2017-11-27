<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Language" content="en-ca">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel="stylesheet" href="./css/style.css" type="text/css" />
    <title>Page d'accueil</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            include("banner.php");
            ?>
        </div>
        <div class="row">
            <nav class="col-md-3 col-sm-3">
                <?php
                include("menu.php");
                ?>
            </nav> 
            <section class="col-md-9 col-sm-9">
                <h2>Liste des exemplaires</h2>
                <?php
                require_once('./modele/classes/Exemplaire.class.php');
                require_once('./modele/classes/User.class.php');
                require_once('/modele/ExemplaireDAO.class.php');
                require_once('/modele/UserDAO.class.php');
                include_once('./modele/classes/ListeLivre.class.php');

                if (ISSET($_REQUEST["numLivre"]))
                //$isbnLivre=$_REQUEST["numLivre"];
                    $dao = new ExemplaireDAO();
                $Exemplaires = $dao->find($_REQUEST["numLivre"]);
                ?>
                <table class='table' id='listeExemplaire'>
                    <thead>
                        <tr>
                            <th>EXEMPLAIRE</th>
                            <th>PROPRIETAIRE</th>
                            <th>DETENTEUR</th>
                            <th></th>
                            <th></th>
                            <!--<th>EMAIL DU DETENTEUR</th>-->
                        <tr>
                    </thead>
                    <?php
                    while ($Exemplaires->next()) {
                        $e = $Exemplaires->getCurrent();
                        //$email = $e->getEmail_det();
                        //echo $e->getEmail_det();
                        if ($e != null)
                        {   $dao = new UserDAO();
                            $user = new User();
                            $user1 = $dao->find($e->getEmail_det());
                             ?>
                       
                            <td><?php echo $e->getCode_exp() ?></td>
                             <td><?php echo $e->getProprietaire() ?></td>
                       <?php
                        if ($e->getEmail_det()!=NULL) {
                             
                            $Detenteur = $user1->getNom(). " " .$user1->getPrenom();
                        }
                        $Detenteur = "";
                       
                            if (($_SESSION["typeUser"] == 'Bibliothèque') or ( $_SESSION["typeUser"] == 'Département Informatique')) {
                               $Detenteur = "";
                                ?> 
                               
                                <td><?php echo $Detenteur ?></td>
                                <td><a href="?action=supprimer&codeExpSup=<?php echo $e->getCode_exp() ?>&detenteur=<?php echo $e->getEmail_det() ?>&proprietaire=<?php echo $e->getProprietaire() ?>&emailproprietaire=<?php echo $e->getEmail_Proprietaire() ?>">Supprimer</a></td>    
            <?php
        } else {
            $email_Dest = $e->getEmail_det();
            ?>
                                <?php
                                if ($e->getEmail_det() == NULL) {
                                    //il faut cacher les parametres          
                                    ?>
                                    <td><a href="?action=emprunter&numEXP=<?php echo $e->getCode_exp() ?>&numprop=<?php echo $e->getProprietaire() ?>&isbnl=<?php echo $_REQUEST['numLivre'] ?> ">Emprunter cet exemplaire</a></td>              
                                    <?php
                                } else {
                                    ?>
                                    <td><a href="?action=formulaireEmail&isbnLivre=<?php echo $_REQUEST["numLivre"] ?>&emailDes=<?php echo $email_Dest ?>">envoyer email</a></td>
                                    <td><a href="?action=changerDet&numR=<?php echo $e->getCode_exp() ?>">Changer de detenteur</a></td>
                                    <?php
                                }
                                ?> 
                                <td><a href="?action=supprimer&codeExpSup=<?php echo $e->getCode_exp() ?>&detenteur=<?php echo $e->getEmail_det() ?>&proprietaire=<?php echo $e->getEmail_det() ?>&emailproprietaire=<?php echo $e->getEmail_Proprietaire() ?>">Supprimer</a></td>    
                                <!--echo $e->getEmail_det() ?>-->
                                </tr>     
                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </section>
        </div>
        </br>
        <div class="row">
                    <?php
                    include("footer.php");
                    ?>
        </div>
    </div>
</body> 
</html>