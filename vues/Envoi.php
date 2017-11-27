<?php
 $de="";
  $a="";
if(isset ($_REQUEST["isbnLivre"])&& isset ($_REQUEST["emailDes"])){
            echo 
            $de=$_SESSION["connect"];
            $isbn=$_REQUEST["isbnLivre"];
            $a=$_REQUEST["emailDes"];
             echo  $de;
             echo   $isbn;
             echo  $a;
        }
        
	
?>

﻿<!DOCTYPE html>
<head>
<meta http-equiv="Content-Language" content="en-ca">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<!--<link rel="stylesheet" href="./css/style.css" type="text/css" />-->
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
    <nav class="col-md-3">
            <?php
	    include("menu.php");
	     ?>
    </nav> 
<section class="col-md-8">
<h2>Envoyer un Email</h2>

<form class="form-horizontal" method="Post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" >De:</label>  
  <div class="col-md-4">
      <input id="de" name="de" type="text" class="form-control input-md" value="<?php echo $de; ?>" required="">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">A:</label>  
  <div class="col-md-4">
  <input id="a" name="a" type="text" class="form-control input-md" value="<?php echo $a; ?>" required="">
 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Sujet:</label>  
  <div class="col-md-4">
      <input id="sujet" name="sujet" type="text" value="Emprunter le livre dont le numéro est : <?php echo $isbn; ?>" class="form-control input-md" required="">
 
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Message</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="message" name="message" required="">Message pour Emprunter le Livre </textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
  
 <!--  a revoir important  -->
    <button id="envoyer" name="envoyer" class="btn btn-primary"><a href="?action=envoyer">★Evaluer</a>Envoyer</button>
  </div>
</div>

</fieldset>
</form>


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


