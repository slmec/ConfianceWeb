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
<h1>La reconnaissance</h1>

<h3>Les reponses au questionnaires concernant le critere : </h3>
<table>
    <tr>
        <td> Questions </td>
        <td> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </td>
        <td> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </td>
        <td> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </td>
        <td> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </td>
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
            if ($row['C1Q1'] == 0) {
                echo "<p style=color:red>Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
            }
            else {
                echo "<p> Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            if ($row['C1Q2'] == 0) {
                echo "<p style='color:red'>Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
            }
            else {
                echo "<p> Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            if ($row['C1Q3'] == 0) {
                echo "<p style='color:red'>Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
            }
            else {
                echo "<p> Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            if ($row['C1Q4'] == 0) {
                echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
            }
            else {
                echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
            }
            ?>
        </td>
    </tr>
</table>

<h3>Ce tableau est a votre disposition pour structurer votre analyse des résultats :  </h3>

<form action="../Modele/ajout_analyse_C1.php" method="post" >
    <table>
        <tr>
            <td> Interpretation personnelle de l'évaluation </td>
            <td> Plan d'action </td>
            <td> Suivi à N+ ...</td>
        </tr>
        <tr>
            <td> <input name="C1_interpretation" type="text" /> </td>
            <td> <input name="C1_plan_action" type="text" /></td>
            <td> <input name="C1_suivi" type="text" /></td>
        </tr>
        <tr>
            <td> <input name="valider l'analyse" type="submit" value="Valider l'analyse" /></td>
        </tr>
    </table>

</form>
<?php
if(isset($_GET['erreur'])){
    $err = $_GET['erreur'];
    if($err==1 )
        echo "<p style='color:red'> Veuillez remplir tous les champs de l'analyse </p>";
}
?>

<form action="Resultats_Diagnostic.php" >
    <button type="submit">Retour au resultat </button>
</form>

</body>
</html>
