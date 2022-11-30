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
                <h1 class="blanc">La reconnaissance</h1>
                <br><hr><br>
            </div>
        </div>
    </div>


    <br>
    <table>
        <?php
        $C1Q1 = $_SESSION['C1Q1'];
        $C1Q2 = $_SESSION['C1Q2'];
        $C1Q3 = $_SESSION['C1Q3'];
        $C1Q4 = $_SESSION['C1Q4'];
        ?>
        <tr>
            <td> Questions </td>
            <td> Le système à base d'IA réduit-il la distinction entre les novices et les experts ? </td>
            <td> Des tâches requérant auparavant de l'expertise sont-elles désormais partiellement ou totalement automatisées? </td>
            <td> Le système à base d'IA supprime-t-il des tâches pénibles, répétitives ou dangereuses ? </td>
            <td> L'introduction de la technologie rend-elle moins visible le résultat de l'activité du travailleur ? </td>
        </tr>
        <tr>
            <td> Vos réponses </td>
            <td><?php if ($C1Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C1Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C1Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C1Q4 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        </tr>
        <tr>
            <td> Implications </td>
            <td>
                <?php
                if ($C1Q1 == 0) {
                    echo "<p style=color:red>Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                }
                else {
                    echo "<p> Reconnaissance de l’individu : un expert se distingue par des performances plus élevées. En généralisant l'expertise, la technologie peut réduire cette différence et alimenter le sentiment d'être facilement substituable.</p>" ;
                }
                ?>
            </td>
            <td>
                <?php
                if ($C1Q2 == 0) {
                    echo "<p style='color:red'>Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                }
                else {
                    echo "<p> Reconnaissance de la pratique: Le savoir-faire est à la base de la reconnaissance des travailleurs. En automatisant un savoir-faire ces derniers perdent un élément de distinction. </p>" ;
                }
                ?>
            </td>
            <td>
                <?php
                if ($C1Q3 == 0) {
                    echo "<p style='color:red'>Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                }
                else {
                    echo "<p> Reconnaissance des efforts: Certaines tâches répétitives ne permettent pas aux travailleurs de se distinguer. Attention toutefois, un travailleur peut se distinguer par des performances physiques supérieures.</p>" ;
                }
                ?>
            </td>
            <td>
                <?php
                if ($C1Q4 == 0) {
                    echo "<p style='color:red'>L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                }
                else {
                    echo "<p> L’automatisation des modalités d’interactions peut induire une limitation du langage préjudiciable aux travailleurs (RPS) et à la précision de la description des situations.</p>" ;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <?php
                if ($C1Q1 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C1Q2 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C1Q3 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C1Q4 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
        </tr>
    </table>
</section>
    <form action="Resultats_Diagnostic_sansid.php" >
        <button type="submit">Retour au resultat </button>
    </form>
</body>
</html>


