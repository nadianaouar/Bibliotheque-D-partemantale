<?php 
    require_once('./modele/classes/Livre.class.php');
    require_once('/modele/classes/Liste.class.php');
    require_once('/modele/LivreDAO.class.php');
    include_once('modele/classes/Database.class.php'); 
    $db = Database::getInstance();
    $titre="";
    $description="";
    $motcles="";
    $image="";
    
    if (isset ($_REQUEST['action'])){
        $dao=new LivreDAO();
        
             $livre = $dao->find($_REQUEST["numAModifier"]);
              if ($livre != NULL) {
                    $titre = $livre->getTitre_livre();
                    $description= $livre->getDescription();
                    $motcles = $livre->getMots_cles();
                    $image=$livre->getNomimg();
                   
        } if (ISSET($_REQUEST['sauver'])) {
                    $livre = new Livre();
                    $livre->setIsbn($_REQUEST["numAModifier"]);
                    $livre->setTitre_livre($_REQUEST['titre']);
                    $livre->setDescription($_REQUEST['description']);
                    $livre->setMots_cles($_REQUEST['mots_cles']);
                  
                    $dao->update($livre);
                    $titre="";
                    $description="";
                    $motcles="";
                }
    }

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
  <title>Modification</title>
  <meta charset="UTF-8">
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
<form class="form-horizontal" action="" method="post">
<fieldset>
 <div name="divImg">
           <img src="imageProjetNadia/<?php echo $image ?>" width="80" height="80">
 </div>
<!-- Form Name -->
<legend>Modification</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Titre du livre</label>  
  <div class="col-md-4">
      <input id="description" name="titre" type="text" placeholder="Titre du livre" class="form-control input-md" value="<?=$titre?>">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Description</label>  
  <div class="col-md-4">
  <input id="description" name="description" type="text" placeholder="Modifier la description du livre" value="<?=$description?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Mots_cles">Mots cles</label>  
  <div class="col-md-4">
  <input id="Mots_cles" name="mots_cles" type="text" placeholder="Ajouter un mot cle" value="<?=$motcles?>" class="form-control input-md">
    
  </div>
  <div class="col-md-4">
    <button id="modifier" name="sauver" class="btn btn-info">Modifier</button>
    <button id="annuler" name="annuler" class="btn btn-info"><a href='?action=chercher'>Annuler</a></button>
  </div>
</div>

</fieldset>
</section>
</div>
<div class="row">
             <?php
	    include("footer.php");
	     ?>
</div>
</div>

</form>
</body>
