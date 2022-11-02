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
<body>
<section>
    <div class="container">
        <header>
            <nav class="navbar">
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/acceuil.php">Accueil</a>
                <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
            </nav>
        </header>
        <div class="block_tableau">
            <br><hr><br>
        </div>
        <nav class="navbar">
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php"> Nouveau Diagnostic </a>
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php">Consulter mes diagnostics</a>
            <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php">Mon profil </a>
            <a href="../Modele/deconnexion.php">Deconnexion</a>
        </nav>
        <div class="block_tableau">
            <br><hr><br>
            <h1 class="blanc">Profil </h1>
            <br><hr><br>
        </div>
    </div>
</section>
    <?php 
          $Id_Utilisateur = $_SESSION['id_Utilisateur'];
      ?>
<?php
$requete = "SELECT Nom, Prenom, Roles, Organisme FROM Utilisateurs WHERE Id_utilisateur =$Id_Utilisateur ";
$resultat = mysqli_query($db,$requete);
$row = mysqli_fetch_assoc($resultat) ;

$_SESSION['nom']=$row['Nom'];
$_SESSION['prenom']=$row['Prenom'];
$_SESSION['role']=$row['Roles'];
$_SESSION['organisme']=$row['Organisme'];
?>
<section>
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
</section>
</body>
</html>