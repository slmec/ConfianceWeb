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
        <td> Le système à base d'IA modifie t-il l'équilibre entre intervention directe sur le produit et supervision de la machine ? </td>
        <td> La technologie rend-elle l'activité plus facile à réaliser par tout un chacun ? </td>
        <td> Le système à base d'IA rend-il des savoir-faire obsolètes ? </td>
        <td> Le système à base d'IA génère t-il de nouvelles tâches pour le travailleur ? </td>
    </tr>
    <tr>
        <td> Vos réponses </td>
        <td><?php if ($row['C5Q1'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C5Q2'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C5Q3'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($row['C5Q4'] == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
            $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
            if ($row['C5Q1'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "Il est possible que la technologie réalise les tâches à haute valeur ajoutée, laissant au travailleur des tâches nécessitant moins de savoir-faire. " ;
            if ($row['C5Q2'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "Cette obsolescence impacte l’estime que le travailleur a de lui même mais aussi sa place dans l’organisation." ;
            if ($row['C5Q3'] == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "La technologie peut s’emparer des tâches à faible valeur ajoutée, permettant au travailleur de réaliser des tâches complexes dans lesquelles il exprime son savoir-faire ou un nouveau savoir-faire, comme l’utilisation de la technologie." ;
            if ($row['C5Q4'] == 0) {
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