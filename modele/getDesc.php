


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
$cnx = new PDO('mysql:host=localhost;dbname=bibliotheque', "root", "root", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES\'UTF8\''));
if (ISSET($_GET["isbnlivre"])) {
    try {

        $requete = "select * from LIVRE where ISBN='" . $_GET["isbnlivre"] . "'";
        $res = $cnx->query($requete);
        foreach ($res as $row) {
            echo $row["DESCRIPTION"];
        }
        $res->closeCursor();
        $cnx = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
    }
} else {
    echo 'pas de isbn';
}
?>
