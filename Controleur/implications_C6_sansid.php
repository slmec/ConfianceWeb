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
$C6Q1 = $_SESSION['C6Q1'];
$C6Q2 = $_SESSION['C6Q2'];
$C6Q3 = $_SESSION['C6Q3'];
$C6Q4 = $_SESSION['C6Q4'];

?>
<h1>La responsabilité</h1>
<table>
    <tr>
        <td> Questions </td>
        <td> L’imputation de responsabilités en cas de problème est-elle un enjeu majeur de l’activité et de l’organisation ?  </td>
        <td> Le système à base d'IA utilise des algorithmes d’apprentissage lui permettant de s’adapter de façon autonome dans un environnement aléatoire ? </td>
        <td> Le système à base d'IA réduit-il la liberté de prise d'initiative du travailleur?  </td>
        <td> Pensez-vous que le système à base d'IA pourrait pousser le travailleur à moins s'investir dans ses tâches et/ou de ses responsabilités ?
            Pensez-vous que le système à base d'IA pourrait induire une passivité du travailleur face à des actions/notifications/recommandations de la machine  ? </td>
    </tr>
    <tr>
        <td> Vos réponses </td>
        <td><?php if ($C6Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($C6Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($C6Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        <td><?php if ($C6Q4== 0) {echo 'Oui';} else {echo 'Non';} ?></td>
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
            $texte = "L'introduction d'une technologie qui automatise des tâches produit une nouvelle division du travail. Toute division du travail réduit le sentiment de responsabilité de chacun vis-à-vis de l'ensemble." ;
            if ($C6Q1 == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>" ;
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "Les algorithmes d'apprentissage sont supposés pouvoir s'adapter à un environnement aléatoire. Cela complexifie l'imputation des responsabilités quand la décision résulte d'un apprentissage et non d'une règle que la technologie se contente d'appliquer." ;
            if ($C6Q2== 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "Le sentiment de responsabilité est proportionnel à l'espace de liberté. Lorsqu'une technologie interfère dans le jugement du travailleur, cela peut inhiber son libre-arbitre et réduire son engagement moral vis-à-vis des conséquences de son action." ;
            if ($C6Q3 == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
        <td>
            <?php
            $texte = "La supériorité présupposée de la technologie peut conduire le travailleur à s'effacer devant l' 'autorité machinique' au détriment de sa propre perception des situations. La performance de la technologie a pour corollaire un désengagement humain." ;
            if ($C6Q4 == 0) {
                echo "<p style='color:red'> $texte </p>" ;
            }
            else {
                echo "<p> $texte </p>";
            }
            ?>
        </td>
    </tr>
</table>

<form action="Resultats_Diagnostic_sansid.php" >
    <button type="submit">Retour au resultat </button>
</form>

</body>
</html>

