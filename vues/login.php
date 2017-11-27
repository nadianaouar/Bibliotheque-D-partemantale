<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta http-equiv="Content-Language" content="en-ca">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css" type="text/css" />
    <style>
        /* Add a gray background color and some padding to the footer */


        .carousel-inner img {
            width: 80%; /* Set width to 100% */
            min-height: 100px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 200px) {
            .carousel-caption {
                display: none; 
            }
        }

        H3{
            COLOR:BLACK;

        }
        .item > a >img {

            max-width: 50%;
            height: auto;
        }
        .well{
            background-color:ECE0F8;
        }

    </style>
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
            <div class="col-sm-6">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="imageProjetNadia/img1.jpe" alt="Image" t566666>
                            <div class="carousel-caption">
                                <h3>HTML/CSS</h3>
                                <p></p>
                            </div>      
                        </div>

                        <div class="item">
                            <img src="imageProjetNadia/img2.jpe" alt="Image">
                            <div class="carousel-caption">
                                <h3>PHP</h3>
                                <p></p>
                            </div>      
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-sm-4 col-sm-offset-1">
                <?php
                if (ISSET($_REQUEST["global_message"]))
                    $msg = "<span class=\"warningMessage\">" . $_REQUEST["global_message"] . "</span>";
                $u = "";

                if (ISSET($_REQUEST["email"]))
                    $u = $_REQUEST["email"];
                ?>
                <div class="well" >
                    <form action="" method="post" class="form-signin">
                        <h2 class="form-signin-heading">Connexion</h2>
                        <label for="email" name="email" class="sr-only">Email </label><br /> 

                        <input for="inputText" type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $u ?>"/>
                        <?php
                        if (ISSET($_REQUEST["field_messages"]["email"]))
                            echo "<br /><span class=\"warningMessage\">" . $_REQUEST["field_messages"]["email"] . "</span>";
                        ?>
                        <br />
                        <label for="inputPassword" class="sr-only">Mot de passe</label>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" >
                        <?php
                        if (ISSET($_REQUEST["field_messages"]["password"]))
                            echo "<br /><span class=\"warningMessage\">" . $_REQUEST["field_messages"]["password"] . "</span>";
                        ?>
                               <div >
                                  <label>
                                      <a href=""> Mot de passe oublie</a>
                                  </label>
                                </div>
                        <br />
                        <button class="btn btn-lg btn-primary btn-block" type="submit"> <input name="action" value="connecter" type="hidden" />Se connecter</button>

                        <br />
                    </form>
                    <form action="" method="post">
                        <button class="btn btn-lg btn-primary btn-block" type="submit"><input name="action" value="binscription" type="hidden" />
                            S'inscrire</button>

                    </form>
                </div> <!-- /container<a href="./vues/inscription.php" > -->
            </div>
        </div>

    <div class="row">
    <div>
        <?php
        include("/vues/footer.php");
        ?>
    </div>
    </div>
       </div>
</body>
</html>


