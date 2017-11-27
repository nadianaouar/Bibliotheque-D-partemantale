<!DOCTYPE html>
<head>
<meta http-equiv="Content-Language" content="en-ca">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="./css/style.css" type="text/css" />
<title>Page d'accueil</title>
<style>
    #imgLivre{
        padding-top: 20px;
        margin-left: 20px;
        margin-right: 50px;
    }
    img{
    
         border-radius: 8px;
    }
    #divLivre{
        
        
        display: block;
    }
</style>

<script language="javascript">
var xhr;

function go(isbnlivre)
{
  var url = "./modele/getDesc.php?isbnlivre="+isbnlivre;
  if (window.ActiveXObject) //si Internet Explorer
  {
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
	if (xhr)
	{
		xhr.onreadystatechange = processStateChange;
		xhr.open("GET",url,true);
	    xhr.send();
	}
  }
  else //si autre navigateur
  {
    xhr = new XMLHttpRequest();
	xhr.onreadystatechange = processStateChange;
	try
	{
		xhr.open("GET",url,true);
	}
	catch (e)
	{
	  alert(e);
	}
	xhr.send(null);
  }
}

function processStateChange()
{
  if (xhr.readyState == 4) //complété
    if (xhr.status == 200)  //réponse OK
	{
	  document.getElementById("desc").innerHTML = /*"Status text : "+xhr.statusText+"<br />"+*/xhr.responseText;
	}
	else
	{
	  document.getElementById("desc").innerHTML = "Problème : "+xhr.statusText;
	  //alert("Problème : "+xhr.statusText);
	}
}

</script>
    
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
    <?php

    require_once('./modele/classes/Exemplaire.class.php');
    require_once('/modele/ExemplaireDAO.class.php');
    include_once('modele/classes/Database.class.php');
    require_once('/modele/EvaluationDAO.class.php');
    
    $db = Database::getInstance();
    
if (ISSET($_REQUEST["ISBNLivre"]))
{$dao = new LivreDAO();
$livre = $dao->find($_REQUEST["ISBNLivre"]);
?>
<h2>Détails du livre</h2>
<hr style="height: 2px; color: black; background-color: black; width: 100%; border: none;"> 
<div class="row">
 <div class="col-md-2" id="imgLivre">      
 <img src="imageProjetNadia/<?php echo $livre->getNomimg() ?>" width="100" height="100">       
 </div>
     <div class="col-md-8"> 
         <div class="form-group" name="divLivre">
            
            <label class="col-md-5 control-label" for="textinput">Titre du livre:</label>  
            <span>
             <?php   echo $livre->getTitre_livre();
               ?> 
            </span>
              
         </div>
         <div class="form-group" name="divLivre">
           
            <label class="col-md-5 control-label" for="textinput" >Description du livre:</label>  
            <span id='desc'>
                
            
                 
            </span>
            <button data-toggle="modal" href="#infos" class="btn btn-primary" value="<?php  echo $_REQUEST['ISBNLivre']; ?>" onclick="go(this.value)">Informations</button>

            
         </div>
          <div class="form-group" name="divLivre">
            <label class="col-md-5 control-label" for="textinput">Éditeur du livre:</label>  
            <span>
             <?php   echo $livre->getEdition();
               ?> 
            </span>
        
         </div>
          <div class="form-group" name="divLivre">
            <label class="col-md-5 control-label" for="textinput">Auteur(s) du livre:</label>  
            <span>
             <?php   echo $livre->getAuteur();
               ?> 
            </span>
        
         </div>
            <div class="form-group" name="divLivre">
            <label class="col-md-5 control-label" for="textinput">MotsClés du livre:</label>  
            <span>
             <?php   echo $livre->getMots_cles();
               ?> 
            </span>
        
         </div>
         <div>
       
         <td><a href='?action=afficheExp&numLivre=<?php echo $_REQUEST['ISBNLivre']; ?>'>Liste des exemplaires</a></td>  
          </div>
       
     </div>
</div>
<div class="row">  
    <p><h2>Évaluations <span class="glyphicon glyphicon-star"></span></h2></p> 
    
     <hr style="height: 2px; color: black; background-color: black; width: 100%; border: none;"> 
    <div class="list-group">
      <?php
      $daoEv = new EvaluationDAO();
      $evaluations = $daoEv ->findIsbn($_REQUEST["ISBNLivre"]);
      foreach ($evaluations as $e)
      {
      ?>   
    <a href="#" class="list-group-item list-group-item-success"><?=$e->getE_descEvaluation()?></a>      
  <?php
 }
}
//$id=$_REQUEST['ISBNLivre'];
?> 
 </div> 
     
    
    

</section>
</div>
</br>
<div class="row">
<?php
include("footer.php");
?>
</div>
</div
</body> 
</html>