<?php
require_once('./controleur/Action.interface.php');
require_once('./controleur/RequirePRGAction.interface.php');

class EvaluerAction implements Action, RequirePRGAction {

    public function execute() {
        if (!ISSET($_SESSION))
            session_start();
        if (!ISSET($_SESSION["connect"])) //utilisateur non connect�.
            return "login";

        if (isset($_REQUEST['evaluer'])) {
            require_once('modele/classes/Evaluation.class.php');
            require_once('modele/EvaluationDAO.class.php');
            require_once('modele/CoursDAO.class.php');
            $daoEv = new EvaluationDAO();

            $evaluation = new Evaluation();
            if (isset($_REQUEST['listeCours'])) {

                if ($_REQUEST['listeCours'] == 'Évaluation Générale') {
                   
                    $codeunique = uniqid();

                    $evaluation->setE_codecours($codeunique);
                } else {
                    //echo $_REQUEST['listeCours'];
                    $daoc = new CoursDAO;
                    //echo  $code;
                    $titreCours = $_REQUEST['listeCours'];
                    $codeCours = $daoc->findCode($titreCours);

                    $evaluation->setE_codecours($codeCours->getCode_cours());
                }

                $code = $_REQUEST['codeLivre'];
                $evaluation->setE_email($_SESSION['connect']);
                $evaluation->setE_isbn($code);
                $evaluation->setE_descEvaluation($_REQUEST['textEvaluation']);
                $evaluation->setE_Note($_REQUEST['listeNote']);


                $daoEv->create($evaluation);
            }
            return "evaluer";
        }
        return "evaluer";
    }

}
?>