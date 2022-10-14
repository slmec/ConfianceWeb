<!DOCTYPE html>
<?php
session_start();
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';

$db = mysqli_connect($db_host, $db_username, $db_password,$db_name);

?>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title></title>

</head>
<body onload="init();">
<?php
$Id_Critere = $_SESSION['id_Critere'];

$requete = "SELECT * FROM Diagnostics WHERE Id_critere_bis = '$Id_Critere'";
$resultat = mysqli_query($db, $requete);
$row = mysqli_fetch_assoc($resultat);

?>

<h1>Les relations humaines </h1>
<table>
    <tr>
        <td> Questions </td>
        <td> La technologie introduit-elle une communication entre des machines ? </td>
        <td> La technologie crée-t-elle une interaction humain-machine au détriment d'une communication entre personnes ? </td>
        <td> La technologie intervient-elle dans la communication entre plusieurs personnes ? </td>
        <td> Le système à base d'IA impose-t-il des lexiques et des syntaxes standardisés pour communiquer ? </td>
    </tr>
    <tr>
        <td> Vos réponses </td>
        <td><?php if ($row['C2Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C2Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C2Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C2Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
    </tr>
    <tr>
        <td> fleche </td>
        <td> fleche </td>
        <td> fleche </td>
        <td> fleche </td>
        <td> fleche </td>
    </tr>
    <tr>
        <td> Implications </td>
        <td>
            <?php
            if ($row['C2Q1'] == 0) {
                echo "<p style='color:red'>La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
            }
            else {
                echo "<p> La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            if ($row['C2Q2'] == 0) {
                echo "<p style='color:red'>Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations. </p>" ;
            }
            else {
                echo "<p> Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            if ($row['C2Q3'] == 0) {
                echo "<p style='color:red'>Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.</p>" ;
            }
            else {
                echo "<p> Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.
</p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            if ($row['C2Q4'] == 0) {
                echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
            }
            else {
                echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
            }
            ?>
        </td>
    </tr>
</table>

<form action="Resultats_Diagnostic.php" >
    <button type="submit">Retour au resultat </button>
</form>

</body>
</html>
