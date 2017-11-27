
    <?php
$nom = "";
$prenom = "";
$telephone = "";
if (isset($_REQUEST["inscription"])) {
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $telephone = $_REQUEST['telephone'];
}

 if(isset($_REQUEST["messages"]["existUser"])){
 echo "<br /><span class=\"warningMessage\">" . $_REQUEST["messages"]["existUser"] . "</span>";
     
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="Content-Type" content="utf-8" />
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./css/style.css" type="text/css" />
        <title></title>    
    </head>
    <body class="my_background">
        <div class="container">
        <div class="row">
            <?php
            include("banner.php");
            ?>
        <form action="" method="POST">      
 <section class="col-md-9 col-sm-9">
﻿   
            
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                        <div class="form-group">
                            <label for="Nom">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom"  required="required" value="<?php echo $nom ?>" >
                            <?php
                            if (ISSET($_REQUEST["messages"]["nom"]))
                                echo "<br /><span class=\"warningMessage\">" . $_REQUEST["messages"]["nom"] . "</span>";
                             if (ISSET($_REQUEST["messages"]["nom1"]))
                                echo "<br /><span class=\"warningMessage\">" . $_REQUEST["messages"]["nom1"] . "</span>";
                            ?>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-3">
                        <div class="form-group">
                            <label for="Prenom">Prénom</label>
                            <input type="text" class="form-control"  name="prenom" id="prenom" required="required" value="<?php echo $prenom ?>" >
                             <?php
                     
                             if (ISSET($_REQUEST["messages"]["prenom1"]))
                                echo "<br /><span class=\"warningMessage\">" . $_REQUEST["messages"]["prenom1"] . "</span>";
                            ?>
                        </div>
                    </div>
                    
                </div>
                
                
                
  <div class="form-group">
  <label class="col-md-2 control-label" for="radios"></label>
  <div class="col-md-6">
  <div class="radio">
      <label class="radio-inline" for="radios-0">
      <input type="radio" name="typeUser" id="radios-0" value="Bibliothèque" >
      Bibliothèque
    </label>
	</div>
  <div class="radio">
     <label  class="radio-inline" for="radios-1">
      <input type="radio" name="typeUser" id="radios-1" value="Département Informatique">
      Département Informatique
    </label>
	</div>
  <div class="radio">
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="typeUser" id="radios-2" value="Professeur" checked="checked">
      Professeur
    </label>
	</div>
  </div>
</div>             
            
                <div class="row">
                    <div class="col-md-offset-2 col-md-7">
                        <div class="form-group">
                            <label for="cle">Clé </label>
                            <input type="text" class="form-control" name="cle" id="cle" placeholder="cle" required="required">
                            <?php
                            if (ISSET($_REQUEST["messages"]["cle"]))
                                echo "<br /><span class=\"warningMessage\" >" . $_REQUEST["messages"]["cle"] . "</span>";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                        <div class="form-group">
                            <label for="Password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required="required">
                        </div>
                    </div>

                    <div class="col-md-offset-1 col-md-3">
                        <div class="form-group">
                            <label for="Vpassword">Confirmation mot de passe</label>
                            <input type="password" class="form-control" id="vpassword" name="confirmpassword" placeholder="Confirmation mot de passe" required="required">
                            <?php
                            if (ISSET($_REQUEST["messages"]["p2"]))
                                echo "<br /><span class=\"warningMessage\">" . $_REQUEST["messages"]["p2"] . "</span>";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-2 col-md-7">
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="required">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-earphone"></span>
                            <input type="number"  class="form-control" placeholder="Téléphone"  name="telephone" >
                     
                        </div>
                    </div>
                </div>

                <br/>
                <div class="row">
                    <div class="col-md-offset-5 col-md-1">
                        <input name="action" value="binscription" type="hidden" />
                        <button type="submit" class="btn btn-primary" id="inscription" name="inscription" >Envoyer mes informations</button>
                    </div>
                </div>
            </div>
             </section>
                   


        <div class="row">
                <?php
                include("footer.php");
                ?>
        </div>
    </div>
</body> 
</html>
     
    </body>
    <!--</<input name="action" value="binscription" type="hidden" />html>-->