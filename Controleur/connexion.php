<!doctype html>
<?php
	
    session_start();
?>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>
<body>
       <?php
		include('HautDePage.php');
	?>
    <?php
        $link =  mysqli_connect("localhost", "eleve.tou", "et*301");
        mysqli_select_db($link, "Confiance" );
             if ( ! $link ) die( "Impossible de se connecter à MySQL" );

        //Données récupérées du formulaire
        //$post_string_email = (string) $_GET['email_Utilisateur'];
        //$_SESSION['email_Utilisateur'] = $_POST['email_Utilisateur'];
        //$_SESSION['mdp_Utilisateur'] = $_POST['mdp_Utilisateur'];

        //Intégration d'une autre variable en vue de la requete
        $email_Utilisateur = $_SESSION['email_Utilisateur'];
        $mdp_Utilisateur = $_SESSION['mdp_Utilisateur'];

        //Affichage des informations importantes de l'utilisateur
        $requete = "SELECT Nom, Prenom FROM Utilisateurs WHERE Email = '$email_Utilisateur' AND MotDePasse = '$mdp_Utilisateur' ";
        $resultat = mysqli_query($link,$requete);
        $row = mysqli_fetch_assoc($resultat) ;
      
        echo "Bienvenue "." ".$row['Prenom']." ".$row['Nom'];
        echo "<br>"."Que souhaitez-vous faire ?"."<br>";
    ?>
        <form action = "diagnostic_new.php">
			<input type="submit" value="Cr&eacute;er un nouveau diagnostic"> 
		</form>
        <form action = "diagnostic_suivi.php">
			<input type="submit" value="Consulter mes diagnostics"> 
		</form>
        <form action = "../profil.php">
			<input type="submit" value="Mon profil"> 
		</form>

    <?php
		include('BasDePage.php');
	?>
    <?php
        mysqli_close( $link );
    ?>
</body>
</html>