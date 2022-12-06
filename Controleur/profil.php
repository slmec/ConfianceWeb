<!DOCTYPE html>
<?php
    session_start();
    $db_username = 'eleve.tou';
    $db_password = 'et*301';
    $db_name     = 'Confiance';
    $db_host     = 'localhost';

    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body background="../Medias/background_v2.jpg">
    <section>
        <div class="container">
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
            <div class="block_tableau">
                <br><hr><br>
            </div>
            <div class="navbar_deux">
                <a href="diagnostic_new.php"> Nouveau Diagnostic </a>
                <a href="diagnostic_suivi.php">Consulter mes diagnostics</a>
                <a class="active" href="profil.php">Mon profil </a>
                <a href="../Modele/deconnexion.php">Deconnexion</a>
            </div>
            <div class="block_tableau">
                <br><hr><br>
                <h1 class="blanc">Profil </h1>
                <br><hr><br>
            </div>
            <?php
                $Id_Utilisateur = $_SESSION['id_Utilisateur'];
                $requete = "SELECT Nom, Prenom, Roles, Organisme FROM Utilisateurs WHERE Id_utilisateur ='$Id_Utilisateur' ";
                $resultat = mysqli_query($db,$requete);
                $row = mysqli_fetch_assoc($resultat) ;

                $_SESSION['nom']=$row['Nom'];
                $_SESSION['prenom']=$row['Prenom'];
                $_SESSION['role']=$row['Roles'];
                $_SESSION['organisme']=$row['Organisme'];
            ?>
            <div class="block_page">

                <div class="block_form">
                    <form action = "modifierprofil.php">
                        <h4> Vos information personnelles : </h4>
                        <p> Nom : <?php echo $_SESSION['nom'] ?>    </p>
                        <p> Prénom : <?php echo $_SESSION['prenom'] ?>  </p>
                        <p> Rôle dans l'intégration du système à base d'IA  : <?php echo $_SESSION['role'] ?>  </p>
                        <p> Organisation : <?php echo $_SESSION['organisme'] ?>  </p>
                        <input type="submit" value="Modifier mes informations">

                    </form>
                </div>
            </div>
        <!-- <form action = "connexion.php">
                    <input type="submit" value="Retour au tableau de bord" >
                </form> -->
            <div class="bas">
                <br>
                <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                <br>
            </div>
        </div>
    </section>
</body>
</html>