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
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_resultats.css" />

</head>
<body background="../Medias/background_v2.jpg">
<?php $Nom_Diagnostic = $_SESSION['Nom_Diagnostic']; ?>
<section>
    <div class="block_entete">
        <header>
            <div class="left">
                <a href="https://www.confiance.ai/" class="logo" target="_blank"><img src="../Medias/logoconfiance.jpg" width="150" height="106"></a>
            </div>
            <div class="middle">
                <nav class="navbar">
                    <a href="../index.php" target="_blank" > MAIAT </a>
                    <a href="inscription.php">Inscription</a>
                    <a class="active" href="identification.php">Connexion</a>
                    <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                    <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                </nav>
            </div>
            <div class="right">
                <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
            </div>
        </header>
        <br><hr><br>
        <div class="navbar_deux">
            <a class="active" href="diagnostic_new.php"> Nouveau Diagnostic </a>
            <a href="diagnostic_suivi.php">Consulter mes diagnostics</a>
            <a href="profil.php">Mon profil </a>
            <a href="../Modele/deconnexion.php">Deconnexion</a>
        </div>
        <br><hr><br>
        <h1 class="blanc">Diagnostic <?php echo $Nom_Diagnostic ?></h1>
        <br><hr><br>
    </div>
    <div class="container">
        <div class="block_form">
            <form action="..\Modele\ajout_traitement.php" method="post" name="profil" target="_self">
                <p> </p>
                <p> <input type="radio" name="Données_diag" value="1" > J'accepte que mes données soient utilisées de façon anonyme par l'Icam</p>
                <p><input name="s'inscrire" type="submit" value="Valider et Retourner au tableau de bord" /></p>
            </form>
        </div>

    </div>
