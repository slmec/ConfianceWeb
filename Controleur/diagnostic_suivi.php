<!DOCTYPE html>
<?php
    session_start();
    $db_username = 'eleve.tou';
    $db_password = 'et*301';
    $db_name     = 'Confiance';
    $db_host     = 'localhost';

    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>

</head>
<body>
    <form action="comparaison_diagnostic.php" method="post" target="_self">
    <?php
        $id_utilisateur = $_SESSION['id_Utilisateur'];
        $resultat2 = mysqli_query($db, "SELECT  a.Nom, b.Prenom FROM Criteres a, Utilisateurs b NATURAL JOIN Repondre c WHERE c.Id_critere = a.Id_critere AND c.Id_utilisateur = '$id_utilisateur'") or die ( "<br>BUG".mysqli_error($link));
        $row2 = mysqli_fetch_assoc($resultat2) ;
    ?>
        <h4> <?= $row2['Prenom']; ?> voici vos diagnostics : </h4>
    <?php
        while ($uneLigne=mysqli_fetch_assoc($resultat2)){
            ?>
                <tr>
                    <td><br><?=($uneLigne['Nom']);?><input type="checkbox" value=".$uneLigne." /></br></td>
                </tr>
                <?php
            }
        ?>
        <button type="submit">Afficher</button>
    </form>

    <!--$rq = "INSERT INTO `Repondre` VALUES ('$Id_Utilisateur', '$Id_Critere')" ;
    //$result =mysqli_query( $db, $rq )or die (mysqli_error($link));


    //$requete = "SELECT Id_critere FROM Repondre WHERE Id_utilisateur =$Id_Utilisateur ";
    //$resultat = mysqli_query($db,$requete);
    //$row = mysqli_fetch_assoc($resultat) ;

    //$_SESSION['id_Critere']=$row['Id_critere'];
    //echo $_SESSION['id_Critere'];
    //echo $_SESSION['id_Utilisateur']; -->
