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
                    <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
                    <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                    <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                    <a  class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                    <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                </nav>
            </header>
            <div class="block_tableau">
                <br><hr><br>
                <h1 class="blanc">Les relations humaines</h1>
                <br><hr><br>
            </div>
        </div>
    </div>
    <?php
        $C2Q1 = $_SESSION['C2Q1'];
        $C2Q2 = $_SESSION['C2Q2'];
        $C2Q3 = $_SESSION['C2Q3'];
        $C2Q4 = $_SESSION['C2Q4'];
    ?>
    <br>
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
            <td><?php if ($C2Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C2Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C2Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C2Q4 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        </tr>
        <tr>
            <td> Implications </td>
            <td>
                <?php
                if ($C2Q1 == 0) {
                    echo "<p style='color:red'>La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                }
                else {
                    echo "<p> La soustraction pure et simple de l’humain dans un système de communication peut avoir des impacts importants, pas seulement socialement mais aussi dans le travail. </p>" ;
                }
                ?>
            </td>
            <td>
                <?php
                if ($C2Q2 == 0) {
                    echo "<p style='color:red'>Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations. </p>" ;
                }
                else {
                    echo "<p> Le remplacement d’une communication humaine par une interaction humain machine peut entraîner un isolement social et une perte de partage d’informations.</p>" ;
                }
                ?>
            </td>
            <td>
                <?php
                if ($C2Q3== 0) {
                    echo "<p style='color:red'>Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.</p>" ;
                }
                else {
                    echo "<p> Une technologie de communication a des effets de formatage sur l’émission et la réception d’une information. Ces effets doivent faire l’objet d’un suivi qualifiant l’impact sur l’intercompréhension.</p>" ;
                }
                ?>
            </td>
            <td>
                <?php
                if ($C2Q4 == 0) {
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
                if ($C2Q1 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C2Q2 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C2Q3 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C2Q4 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
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
