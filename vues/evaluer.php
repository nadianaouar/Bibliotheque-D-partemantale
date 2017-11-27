<?php
header('Content-type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <table>
                        <td>
                            <div>
                                <?php
                                require_once('/modele/LivreDAO.class.php');
                                $daoL = new LivreDAO();
                                $livre = $daoL->find($_REQUEST['codeLivre']);
                                if ($livre)
                                    
                                    ?>
                                <img src="imageProjetNadia/<?php echo $livre->getNomimg(); ?>" width="130" height="130">
                                <?php echo $livre->getTitre_livre(); ?>

                            </div>
                        </td>
                        <td>
                            <div class="col-md-offset-2">
                                <p><h4>Rediger votre evaluation pour ce livre</h4> </p>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="comment">Choisir pour quel cours parmi la liste:</label>
                                        <select class="form-control" id="liste1" name="listeCours">  
                                            <option value="Évaluation Générale">Évaluation Générale</option>
                                            <?php
                                            require_once('/modele/CoursDAO.class.php');
                                            $dao = new CoursDAO();
                                            $listecours = $dao->findAll();

                                            foreach ($listecours as $c) {
                                                $titrecours = $c->getTitre_cours();
                                                ?>
                                                <option value="<?php echo $c->getTitre_cours() ?>"><?php echo $c->getTitre_cours() ?></option>
                                            <?php }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Evaluation:</label>
                                        <textarea class="form-control" rows="5" id="evaluation1" name="textEvaluation" required="required"></textarea>
                                    </div>
                                    <div>
                                        <label for="comment">Choisir une note:</label>
                                        <select class="form-control" id="liste2" name="listeNote">
                                            <?php
                                            for ($i = 0; $i <= 10; $i++) {
                                                ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php }
                                            ?>

                                        </select>
                                    </div>
                                    </br>
                                    <div class="col-md-offset-5 col-md-1">
                                        <button type="submit" class="btn btn-primary" id="evaluer" name="evaluer" >Enregistrer </button>
                                        </br>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </td>
                        </div>
                    </table> 
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