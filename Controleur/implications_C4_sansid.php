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
    <link rel="stylesheet" href="../Vue/style_resultats_analyse.css" />
    <link rel="stylesheet" href="../Vue/style_fond_resultats_diagramme.css" />
    <title>MAIAT</title>

</head>
<body>
<section>
    <div class="block_entete">
        <div class="container">
            <header>
                <nav class="navbar">
                    <a href="../index.php" target="_blank" > MAIAT </a>
                    <a  href="inscription.php">Inscription</a>
                    <a  href="identification.php">Connexion</a>
                    <a  class="active" href="testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                    <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                </nav>
            </header>
            <div class="block_tableau">
                <br><hr><br>
                <h1 class="blanc">La perte d'autonomie</h1>
                <br><hr><br>
            </div>
        </div>
    </div>

    <table>
        <?php
        $C4Q1 = $_SESSION['C4Q1'];
        $C4Q2 = $_SESSION['C4Q2'];
        $C4Q3 = $_SESSION['C4Q3'];
        $C4Q4 = $_SESSION['C4Q4'];

        ?>
        <br>
        <tr>
            <td> Questions </td>
            <td> Le système à base d'IA détermine-t-il un déroulement de l’action du travailleur ? </td>
            <td> Le système à base d'IA émet-il des notifications à l’adresse du travailleur ? </td>
            <td> Le système à base d'IA réduit-il ou rend-il plus difficile la prise d’initiative pour le travailleur ? </td>
            <td> Le travailleur dispose-t-il de marge manœuvre convenue dans l’utilisation ou l’interprétation du système à base d'IA ? </td>
        </tr>
        <tr>
            <td> Vos réponses </td>
            <td><?php if ($C4Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C4Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C4Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C4Q4 == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
        </tr>
        <tr>
            <td> Implications </td>
            <td>
                <?php
                $texte = "La planification et l'organisation font partie intégrante du savoir-faire des travailleurs. Dicter le rythme peut entraîner une souffrance au travail et dégrader la flexibilité cognitive permettant de s’adapter aux aléas." ;
                if ($C4Q1 == 0) {
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
                if ($C4Q2 == 0) {
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
                if ($C4Q3== 0) {
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
                if ($C4Q4 == 0) {
                    echo "<p style='color:red'> $texte </p>" ;
                }
                else {
                    echo "<p> $texte </p>";
                }
                ?>
            </td>
        <tr>
            <td> </td>
            <td>
                <?php
                if ($C4Q1 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C4Q2 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C4Q3 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C4Q4 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
        </tr>

        </tr>
    </table>
    <form action="Resultats_Diagnostic_sansid.php" >
        <button type="submit">Retour au resultat </button>
    </form>
</section>
</body>
</html>
