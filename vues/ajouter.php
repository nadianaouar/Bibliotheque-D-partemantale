<?php

$visbn = "";
$vtitre = "";
$vauteur = "";
$vdescription = "";
if (ISSET($_REQUEST["isbn"]))//si le formulaire est renvoyé sans etre valide on peut rècuperer les valeurs deja saisi sans le resaisir encore une fois 
    $visbn = $_REQUEST["isbn"];

if (ISSET($_REQUEST["titre"]))
    $vtitre = $_REQUEST["titre"];

if (ISSET($_REQUEST["auteur"]))
    $vauteur = $_REQUEST["auteur"];

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Ajout d'un livre </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>       
    </head> 
    <body>
        <div class="container">
            <div class="row" >
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
                        <div >
                     <?php
                     if (ISSET($_REQUEST["messages"]["succésLivre"]))
                   {
                //a revoir changer le style          
                    echo "<span class=\"warningMessage\">" .$_REQUEST["messages"]["succésLivre"]. "</span>";                   
                   }
                   echo'</div>';
                   echo '<div>';
                    if (ISSET( $_REQUEST["messages"]["succésExemplaire"]))
                   {
                //a revoir changer le style          
                    echo "<span class=\"warningMessage\">" . $_REQUEST["messages"]["succésExemplaire"]. "</span>";                   
                   } 
                    if (ISSET($_REQUEST["messages"]["ErreurLivre"]))
                   {
                //a revoir changer le style          
                    echo "<span class=\"warningMessage\">" . $_REQUEST["messages"]["ErreurLivre"]. "</span>";                   
                   }  
               
                   ?>
                                     
                </div>
                    <div>
                        <form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
          
                             <fieldset>
                            <legend>Ajout du livre</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">ISBN</label>  
                                <div class="col-md-4">
                                    <input id="isbn" name="isbn" type="text" placeholder="" class="form-control input-md" value="<?php echo $visbn ?>">
                                    <?php
                                    if (ISSET($_REQUEST["field_messages"]["isbn"]))
                                        echo "<br /><span class=\"warningMessage\">" . $_REQUEST["field_messages"]["isbn"] . "</span>";
                                    ?>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Titre ">Titre du livre</label>  
                                <div class="col-md-4">
                                    <input id="titre " name="titre" type="text" placeholder="" class="form-control input-md" value="<?php echo $vtitre ?>">
                                    <?php
                                    if (ISSET($_REQUEST["field_messages"]["titre"]))
                                        echo "<br /><span class=\"warningMessage\">" . $_REQUEST["field_messages"]["titre"] . "</span>";
                                    ?>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Description du livre</label>
                                <div class="col-md-4">                     

                                    <textarea class="form-control"  id="description" name="description" ></textarea>

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="auteur">Auteur(s)</label>  
                                <div class="col-md-4">
                                    <input id="auteur" name="auteur" type="text" placeholder="" class="form-control input-md" value="<?php echo $vauteur ?>">
                                    <?php
                                    if (ISSET($_REQUEST["field_messages"]["auteur"]))
                                        echo "<br /><span class=\"warningMessage\">" . $_REQUEST["field_messages"]["auteur"] . "</span>";
                                    ?>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="anee">Année</label>  
                                <div class="col-md-4">
                                    <input id="annee" name="annee" type="number" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nomimg">Photo</label>  
                                <div class="col-md-4">
                                    <input type="file" id="nomimg" name="nomimg" type="text"  class="form-control input-md">   
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="edition">Édition</label>  
                                <div class="col-md-4">
                                    <input id="edition" name="edition" type="text"  class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="langue">Langue</label>  
                                <div class="col-md-4">
                                    <input id="langue" name="langue" type="text" placeholder="" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="motscles">Mot(s) clé(s) du livre</label>
                                <div class="col-md-4">                     
                                    <textarea class="form-control" id="motscles" name="motscles" rows='7' cols="5"></textarea>
                                </div>
                            </div>
                            
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""></label>
                                <div class="col-md-4">
                                    
                                    <button id="" name="ajoutlivre" class="btn btn-primary" type="submit"><input name="action" value="ajouter" type="hidden" />Ajouter</button>
                                </div>
                            </div>
                        </fieldset>
                         
                       </form>
                    </div>
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
