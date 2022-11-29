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
                <h1 class="blanc">Le savoir faire</h1>
                <br><hr><br>
            </div>
        </div>
    </div>
    <?php
    $C5Q1 = $_SESSION['C5Q1'];
    $C5Q2 = $_SESSION['C5Q2'];
    $C5Q3 = $_SESSION['C5Q3'];
    $C5Q4 = $_SESSION['C5Q4'];

    ?>
    <br>
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
            <td><?php if ($C5Q1 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C5Q2 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C5Q3 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
            <td><?php if ($C5Q4 == 0) {echo 'Oui';} else {echo 'Non';} ?></td>
        </tr>

        <tr>
            <td> Implications </td>
            <td>
                <?php
                $texte = "Quand l’activité du travailleur n’est plus de produire mais d'agir sur des logiciels et/ou machinnes , alors celui-ci peut ressentir une plus value réduite ou une perte d’intérêt. " ;
                if ($C5Q1== 0) {
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
                if ($C5Q2 == 0) {
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
                if ($C5Q3 == 0) {
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
                if ($C5Q4 == 0) {
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
                if ($C5Q1 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C5Q2 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C5Q3 == 0) {
                    echo'<img src="../Medias/icone.png" width=50px height=50px >';
                }
                else {
                    echo "<p></p>";
                }
                ?>
            </td>
            <td>
                <?php
                if ($C5Q4 == 0) {
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
