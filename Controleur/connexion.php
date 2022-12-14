<!doctype html>
<?php include("../Modele/connexion_bdd.php"); ?>
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
                        <a  href="inscription.php">Inscription</a>
                        <a class="active" href="identification.php">Connexion</a>
                        <a  href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                        <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                    </nav>
                </div>
                <div class="right">
                    <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                </div>
            </header>
            <div class="block_tableau">
                <br><hr><br>
                <h1 class="blanc">Tableau de bord</h1>
                <br><hr><br>
            </div>
            <div class="navbar_deux">
                <a href="diagnostic_new.php"> Nouveau Diagnostic </a>
                <a href="diagnostic_suivi.php">Consulter mes diagnostics</a>
                <a href="profil.php">Mon profil </a>
                <a href="../Modele/deconnexion.php">Deconnexion</a>
            </div>
            <div class="block_tableau">
                <br><hr><br>
            </div>

            <!-- Corps de texte !-->
            <div class="block_page">
            <?php
                $link =  mysqli_connect("localhost", "eleve.tou", "et*301");
                mysqli_select_db($link, "Confiance" );
                     if ( ! $link ) die( "Impossible de se connecter à MySQL" );

                //Intégration d'une autre variable en vue de la requete
                $Email = $_SESSION['Email'];
                $MotDePasse = $_SESSION['MotDePasse'];

                //Affichage des informations importantes de l'utilisateur
                $requete = "SELECT Nom, Prenom FROM Utilisateurs WHERE Email = '$Email'";
                $resultat = mysqli_query($link,$requete);
                $row = mysqli_fetch_assoc($resultat) ;
            ?>
                <h2 class ="blanc "><?php echo "Bienvenue "." ".$row['Prenom']." ".$row['Nom']; ?></h2>

            <?php
                mysqli_close( $link );
            ?>
            </div>
    </body>
</html>