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
<h1>La surveillance</h1>
<table>
    <tr>
        <td> Questions </td>
        <td> Le système à base d'IA intègre-t-il une caméra/micro susceptible de filmer/écouter le travailleur ou d’être perçu comme tel ? </td>
        <td> La technologie implique-t-elle des identifiants permettant de collecter des données sur son utilisateur ? </td>
        <td> Les données collectées par le système à base d'IA sont-elles exploitées pour mesurer la productivité de son utilisateur ? </td>
        <td> La finalité de l’utilisation des données est-elle transparente ? </td>
    </tr>
    <tr>
        <td> Vos réponses </td>
        <td><?php if ($row['C1Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C1Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C1Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C1Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
            $texte = "Que ces appareils soient utilisés pour la surveillance ou non, ils portent un imaginaire fortement ancré qui sera plus ou moins activé suivant la technologie." ;
            if ($row['C3Q1'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "La personnification des données recueillies augmente significativement la méfiance." ;
            if ($row['C3Q2'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "La collecte de données d'activité du travailleur peut être exploitée  pour augmenter sa productivité et intensifier le travail." ;
            if ($row['C3Q3'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "Les machines et plus spécifiquement celles à base d’IA renvoient à un imaginaire important. L'absence de transparence de la finalité des données augmente la méfiance. " ;
            if ($row['C3Q4'] == 0) {
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
