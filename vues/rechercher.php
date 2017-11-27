<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<head>
    <title>Recherche</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            include("banner.php");
            ?>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php
                include("menu.php");
                ?>
            </div> 

            <section class="col-md-9 col-sm-9">
                <div >
                    <?php
                    if (isset($_REQUEST["messages"]["supprimer"])) {
                        echo "<span class=\"warningMessage\">" . $_REQUEST["messages"]["supprimer"] . "</span>";
                    }

                    if (ISSET($_REQUEST["messages"]["succés"])) {
                        //a revoir changer le style          
                        echo "<span class=\"warningMessage\">" . $_REQUEST["messages"]["succés"] . "</span>";
                    }
                    if (ISSET($_REQUEST["messages"]["suppressionInterdit"])) {
                        //a revoir changer le style          
                        echo "<span class=\"warningMessage\">" . $_REQUEST["messages"]["suppressionInterdit"] . "</span>";
                    }
                    if (ISSET($_REQUEST["messages"]["suppression"])) {
                        //a revoir changer le style          
                        echo "<span class=\"warningMessage\">" . $_REQUEST["messages"]["suppression"] . "</span>";
                    }
                    ?>


                </div>
                <!-- Multiple Radios -->
                <legend>Recherche d'un livre </legend>
                <div>
                    <form role="search" name="searchform" method="get">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" placeholder="recherche" name="motCle" class="form-control left-rounded">
                                        <div class="input-group-btn">
                                            <input type="text" class="hidden" name="action" value="chercher">
                                            <button type="submit" class="btn btn-inverse right-rounded">Chercher</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
                <div>

                    <?php
                    require_once('/modele/classes/Livre.class.php');
                    require_once('/modele/classes/Liste.class.php');
                    require_once('/modele/LivreDAO.class.php');
                    include_once('modele/classes/Database.class.php');
                    $db = Database::getInstance();


                    if (ISSET($_REQUEST["motCle"])) {

                        $dao = new LivreDAO();
                        $livres = $dao->findMot($_REQUEST["motCle"]);
                        ?>
                        <h3>Resultat de la  recherche : Liste des livres </h3>
                        <table class='table' id='listeLivre'>
                            <thead>
                                <tr>
                                    <th>LIVRE</th>
                                    <th>TITRE</th>
                                    <th>DESCRIPTION</th>
                                    <th>           </th>
                                    <th>           </th>
                                <tr>
                            </thead>
                            <?php
                            foreach ($livres as $l) {
                                ?>

                                <tr>
                                    <td><a href="?action=afficherLivre&ISBNLivre=<?php echo $l->getIsbn(); ?>"><img src="imageProjetNadia/<?php echo $l->getNomimg() ?>" width="80" height="80"> </a>
                                    </td>
                                    <td><?php echo $l->getTitre_livre(); ?></td>
                                    <td><?php echo $l->getDescription(); ?></td>
                                   <!-- <input name="action" value="evaluer" type="hidden" />-->
                                    <td><a href="?action=evaluer&codeLivre=<?php echo $l->getIsbn(); ?>">★Evaluer</a></td>
                                    <td><a href='?action=modifier&numAModifier=<?php echo $l->getIsbn(); ?>' class="pull-right hidden-xs showopacity glyphicon glyphicon-edit">Modifier</a></td>
                                    <td><a href='?action=ajouterExp&numAjouter=<?php echo $l->getIsbn(); ?>'><span class="glyphicon glyphicon-plus-sign"></span>un exemplaire</a></td>
                                    <td><a href='?action=afficheExp&numLivre=<?php echo $l->getIsbn(); ?>'>Liste des exemplaires</a></td>
                                </tr>  
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
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