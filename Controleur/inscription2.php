<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
  <?php 
   $link =  mysqli_connect("localhost", "eleve.tou", "et*301");
   
   mysqli_select_db($link, "Confiance" );
    if ( ! $link ) die( "Impossible de se connecter à MySQL" );

    $nom_utilisateur = $_POST['nom_utilisateur'];
    $prenom_utilisateur = $_POST['prenom_utilisateur'];
    $email_utilisateur = $_POST['email_utilisateur'];
    $mdp_utilisateur = $_POST['mdp_utilisateur'];
    $role_utilisateur = $_POST['role_utilisateur'];
    $organisme_utilisateur = $_POST['organisme_utilisateur'];
    $donnees_utilisateur = $_POST['donnees_utilisateur'];

    $requete = "INSERT INTO Utilisateurs VALUES ('','$nom_utilisateur','$prenom_utilisateur','$email_utilisateur','$mdp_utilisateur','$role_utilisateur','$organisme_utilisateur','$donnees_utilisateur')";
    $result =mysqli_query( $link, $requete )or die (mysqli_error($link)); //exécution de la requête

     //fermer la connexion à la BDD 
    

    
   ?>

</head>
<body>
    <?php
    include('nav.php')
	?>

    <h1>Devenez membre de MAIAT</h1>

    <p>&nbsp;</p>

    <h3>Vous etes bien inscrit ! </h3>

    <p> Maintenant vous pouvez vous  <a href="identification.php">Connecter</a></p>
    


    <?php
    include('footer.php')
    	?>
</body>
</html>