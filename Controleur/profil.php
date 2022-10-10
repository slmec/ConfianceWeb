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
	<title></title>

</head>
<body>

    <?php 
          $Id_Utilisateur = $_SESSION['id_Utilisateur'];
      ?>

    <h1>Espace Membre</h1>
    <p>&nbsp;</p>
    <h3>Bienvenue sur votre profil </h3>

    <h4> Vos information personnelles : </h4>
      <?php 
        $requete = "SELECT Nom, Prenom, Roles, Organisme FROM Utilisateurs WHERE Id_utilisateur =$Id_Utilisateur ";
        $resultat = mysqli_query($db,$requete);
        $row = mysqli_fetch_assoc($resultat) ;

        $_SESSION['nom']=$row['Nom'];
        $_SESSION['prenom']=$row['Prenom'];
        $_SESSION['role']=$row['Roles'];
        $_SESSION['organisme']=$row['Organisme'];
      ?>

      <form action = "modifierprofil.php">
      <p> Nom : <?php echo $_SESSION['nom'] ?>    </p>
      <p> Prénom : <?php echo $_SESSION['prenom'] ?>  </p>
      <p> Rôle dans l'intégration du système à base d'IA  : <?php echo $_SESSION['role'] ?>  </p>
      <p> Organisme : <?php echo $_SESSION['organisme'] ?>  </p>
      <input type="submit" value="Modifier mes informations"> 
      
      </form>  

    <form action = "connexion.php">
			<input type="submit" value="Retour sur l'accueil de connexion"> 
		</form>

</body>
</html>