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
                <h1 class="blanc">La surveillance</h1>
                <br><hr><br>
            </div>
        </div>
    </div>
    <?php
    $C3Q1 = $_SESSION['C3Q1'];
    $C3Q2 = $_SESSION['C3Q2'];
    $C3Q3 = $_SESSION['C3Q3'];
    $C3Q4 = $_SESSION['C3Q4'];
    ?>
    <br>
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
            <td><?php if ($C3Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C3Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C3Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C3Q4 == 0) {echo 'Non';} else {echo 'Oui';} ?></td>
        </tr>
        <tr>
            <td> Implications </td>
            <td>
                <?php
                $texte = "Que ces appareils soient utilisés pour la surveillance ou non, ils portent un imaginaire fortement ancré qui sera plus ou moins activé suivant la technologie." ;
                if ($C3Q1 == 0) {
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
                if ($C3Q2 == 0) {
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
                if ($C3Q3 == 0) {
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
                if ($C3Q4 == 0) {
                    echo "<p style='color:red'> $texte </p>" ;
                }
                else {
                    echo "<p> $texte </p>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <?php
                if ($C3Q1 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C3Q2 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C3Q3 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C3Q4 == 0) {
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
</section>
</body>
</html>


