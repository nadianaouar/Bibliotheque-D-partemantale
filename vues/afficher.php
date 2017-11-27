<!DOCTYPE html>
<head>
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
            <nav class="col-md-3 col col-sm-3">
                <?php
                include("menu.php");
                ?>
            </nav> 
            <section class="col-md-9 col-sm-9">
                <h2>Liste des livres</h2>

                <?php
                require_once('./modele/classes/Livre.class.php');
                require_once('./modele/classes/ListeLivre.class.php');
                require_once('./modele/LivreDAO.class.php');

                $dao = new LivreDAO();
                if (ISSET($_SESSION['navig'])) {
                    $numPage = 1;
                    if (ISSET($_REQUEST["numPage"])) {
                        $numPage = $_REQUEST["numPage"];
                    }
                    $liste = $dao->getPage($numPage, 4);
                    ?>
                    Page <?php echo $numPage ?> de <?php echo $_SESSION['navig']["nbPages"] ?>
                    <?php
                    $x = ($numPage - 1) * $_SESSION['navig']["taillePage"] + 1;
                    $y = ($numPage) * $_SESSION['navig']["taillePage"];
                    if ($y > $_SESSION['navig']["nbResultats"])
                        $y = $_SESSION['navig']["nbResultats"];
                    ?>
                    --- R&eacute;sultats <?php echo $x ?> &agrave; <?php echo $y ?> sur un total de <?php echo $_SESSION['navig']["nbResultats"] ?><br />

                    <table id="barreNavigation" class="pagination">
                        <tr>

    <?php
    if ($numPage > 1)
    {
    ?>
                                <td><a href="./?action=afficher&numPage=1"><b>&lt;&lt;</b></a> </td>
                                <td><a href="./?action=afficher&numPage=<?php echo $numPage - 1 ?>"><b>&lt;</b></a></td>
                                <?php
                            } else {
                                ?>
                                <td><b>&lt;&lt;</b></td>
                                <td><b>&lt;</b></td>
                                <?php
                            }
                            for ($i = 1; $i <= $_SESSION["navig"]["nbPages"]; $i++) {
                                if ($i == $numPage) {

                                    echo "<td>" . $i . "</td>";
                                } else {
                                    echo "<td><a href=\"./?action=afficher&numPage=" . $i . "\">" . $i . "</a></td>";
                                }
                            }
                            if ($numPage < $_SESSION["navig"]["nbPages"]) {
                                ?>
                                <td><a href="./?action=afficher&numPage=<?php echo $numPage + 1 ?>"><b>&gt;</b></a></td> 
                                <td><a href="./?action=afficher&numPage=<?php echo $_SESSION["navig"]["nbPages"] ?>"><b>&gt;&gt;</b></a></td>
                                <?php
                            } else {
                                ?>
                                <td><b>&gt;</b></td><td><b>&gt;&gt;</b></td> 
                                <?php
                            }
                            ?>
                        </tr>
                    </table> 
                            <?php
                            $s = "&numPage=" . $numPage;
                            ?>
                            <?php
                            echo " <table class='table' id='listeLivre'>
            <thead>
             <tr>
             <th>LIVRE</th>
             <th>TITRE</th>
             <th>DESCRIPTION</th>
             </tr>
             </thead>";

                            while ($liste->next()) {
                                $p = $liste->getCurrent();
                                if ($p != null) {
                                    //echo "<tr><td>".$p."</td><td><a href='?action=supprimer&numASupprimer=".$p->getIsbn().$s."'>supprimer</a></td></tr>";
                                //$isbnLivre=$p->getIsbn();   ?>
                            <tr>
                                <td><a href="?action=afficherLivre&ISBNLivre=<?php echo $p->getIsbn(); ?>"><img src="imageProjetNadia/<?php echo $p->getNomimg() ?>" width="80" height="80"> </a></td>
                                <td><?php echo $p->getTitre_livre() ?></td>
                                <td><?php echo $p->getDescription() ?></td>
                            </tr>       

                            <?php
                        }
                    }
                }
                echo "</table>";
                ?>	
            </section>
        </div>            


        <div class="row">
                <?php
                include("footer.php");
                ?>
        </div>
    </div>
</body> 
</html>
