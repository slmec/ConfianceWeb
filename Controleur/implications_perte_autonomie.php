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
<h1>La prete d'autonomie </h1>
<table>
    <tr>
        <td> Questions </td>
        <td> Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </td>
        <td> Le système à base d'IA émet-il des notifications à l’adresse du travailleur ? </td>
        <td> Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ? </td>
        <td> Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ? </td>
    </tr>
    <tr>
        <td> Vos réponses </td>
        <td><?php if ($row['C4Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C4Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C4Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C4Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
            $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
            if ($row['C4Q1'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "Les notifications peuvent interrompre les travailleurs dans leur activité. Elles peuvent aussi interférer sur la liberté de jugement." ;
            if ($row['C4Q2'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "La technologie peut faire passer les travailleurs d’une logique pro-active à une logique réactive. Ils peuvent aussi ne plus oser de peur de questionner le processus algorithmique ou de se tromper." ;
            if ($row['C4Q3'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "L’absence de marge de manoeuvre autorisée par l’organisation vis à vis de la technologie peut réduire sa capacité d’adaptation et l’intérêt qu’il ressentira pour son activité. " ;
             if ($row['C4Q4'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
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


