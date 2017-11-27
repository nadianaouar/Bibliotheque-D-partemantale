<!DOCTYPE html>
<head>
<meta http-equiv="Content-Language" content="en-ca">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap/js/bootstrap.min.js">

<link rel="stylesheet" href="./css/style.css" type="text/css" />
<title>Page d'accueil</title>

</head>

<div id="banner" class="container" >
    <h3>Bibliothèque De Département Informatique</h3> 
<!--       <img src="imageProjetNadia/imgLivre7.jpe" class="img-circle" alt="Cinque Terre" width="220" height="100"> </h3>  -->
 
</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li class="active"><a href=""><input name="action" value="connecter" type="hidden" />Acceuil</a></li>
        
        <?php 
           if (ISSET($_SESSION["connect"]))
           {
           ?>
        <li><a href="#"><span class="glyphicon glyphicon-check"></span><?php echo $_SESSION["connect"]; ?></a></li>
          <?php
          }
           ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
           <?php 
           if (empty($_SESSION["connect"]))
           {
           ?>
        <li><a href='?action=connecter'><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
        <?php 
           }
           else 
           {
           ?>
        <li><a href='?action=deconnecter'><span class="glyphicon glyphicon-log-in"></span>Se deconnecter</a></li>
        <?php 
           }
           
           ?>
      </ul>
    </div>
  </div>
</nav>
