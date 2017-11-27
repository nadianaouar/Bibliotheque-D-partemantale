
<h2>Liste des cours</h2>

<?php
require_once('/modele/CoursDAO.class.php');
require_once('/modele/EvaluationDAO.class.php');
require_once('/modele/LivreDAO.class.php');

$daoE = new EvaluationDAO();
//$listeLivresE = $daoE->find($codecours);
$listeLivresE = $daoE->findAll();
foreach ($listeLivresE as $le) {      //echo $le->getE_isbn();
    $codeL = $le->getE_isbn();
    $codeCours = $le->getE_codecours();
    $daoCours = new CoursDAO();
    $listeCours1 = $daoLivre->find($codeCours);
    //echo $listeCours1->getTitre_cours();
    ?>   
    <div>
        <table class='table' id='listeLivre'>
            <thead>
                <tr>
                    <th>LIVRE</th>
                    <th>TITRE</th>

                </tr>
            </thead>
            <?php
            $daoLivre = new LivreDAO();
            $listeLivres = $daoLivre->find($codeL);
            ?>
            <tr>
                <td><img src="imageProjetNadia/<?php echo $listeLivres->getNomimg() ?>" width="80" height="80"></td>
                <td><?php echo $listeLivres->getTitre_livre() ?></td>
                <td><?php echo $listeLivres->getTitre_livre() ?></td>

            </tr>
    <?php
}
?>

    </table>

</div>

</div>      
</div>
