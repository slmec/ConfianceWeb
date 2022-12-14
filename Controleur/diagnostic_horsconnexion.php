<!DOCTYPE html>
<?php
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
?>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body background="../Medias/background_v2.jpg">
    <section>
        <div class="container">
            <!-- Barre de navigation !-->
            <header>
                <div class="left">
                    <a href="https://www.confiance.ai/" class="logo" target="_blank"><img src="../Medias/logoconfiance.jpg" width="150" height="106"></a>
                </div>
                <div class="middle">
                    <nav class="navbar">
                        <a href="../index.php" target="_blank" > MAIAT </a>
                        <a href="inscription.php">Inscription</a>
                        <a href="identification.php">Connexion</a>
                        <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                        <a class="active" href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                    </nav>
                </div>
                <div class="right">
                    <a href="https://www.icam.fr/" class="logo_icam" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                </div>
            </header>
            <div class ="block_page">
                <!-- Coprs de page !-->
                <div class ="block_titre">
                    <h1>Diagnostic hors ligne</h1>
                    <br>
                </div>
                <div class="block_form">
                    <form action="" >
                        <p>Ce mode vous permet de réaliser un diagnostic sans stockage de données et sans connexion grâce à un fichier Excel.</p>
                        <p>Pour se faire, nous vous invitons à <span class="gras">télécharger le format Excel de MAIAT</span> en cliquant sur l’un des boutons suivants : </p>
                        <br>
                        <div class="bouton_telechargement">
                            <a href="../Medias/MAIAT_Horizontal.xlsm" class="tableur" download >Tableur MAIAT horizontal (adapté aux écrans supérieurs 17'')</a>
                            <a href="../Medias/MAIAT_Vertical.xlsm" class="tableur" download >Tableur MAIAT vertical (adapté aux ordinateurs portables)</a>
                        </div>
                        <br>
                        <p>Attention, le fichier comporte des « macros » permettant de générer des diagnostics. Par conséquent, il risque de présenter ce bandeau : </p>
                        <br>
                        <img class="img_securite" src="../Medias/rouge.png" width="600" height="24">
                        <br>
                        <p> Dès lors que vous téléchargerez le fichier depuis notre serveur, nous vous garantissons sa sécurité. Pour déverrouiller les macros, il vous faudra : </p>
                        <p> 1 - Fermer le fichier Excel</p>
                        <p> 2 - Ouvrez l’Explorateur de fichiers Windows, puis accédez au dossier dans lequel vous avez enregistré le fichier.</p>
                        <p> 3 - Cliquez avec le bouton droit sur le fichier, puis sélectionnez "Propriétés" dans le menu contextuel.</p>
                        <p> 4 - En bas de l’onglet Général, cochez la case Débloquer et sélectionnez OK. </p>
                        <p> 5 - Ouvrer votre fichier</p>
                        <br>
                        <p> Bonne utilisation de MAIAT ! </p>
                    </form>
                </div>
                <!-- Bas de page !-->
                <div class="bas">
                    <br>
                    <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                    <br>
                </div>
            </div>
        </div>
    </section>
</body>

