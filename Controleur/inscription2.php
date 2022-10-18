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
    /*$mdp_utilisateur_hash = password_hash($mdp_utilisateur,PASSWORD_DEFAULT);*/
    $role_utilisateur = $_POST['role_utilisateur'];
    $organisme_utilisateur = $_POST['organisme_utilisateur'];
    $donnees_utilisateur = $_POST['donnees_utilisateur'];


     //fermer la connexion à la BDD 
  ?>

</head>
<body>
<?php
    if($nom_utilisateur !== "" && $prenom_utilisateur !== "" && $email_Utilisateur !== "" && $mdp_Utilisateur !== "" && $role_utilisateur !== "" && $organisme_utilisateur !== "" && $donnees_utilisateur !== "" ) {
        $requete = "INSERT INTO Utilisateurs VALUES ('','$nom_utilisateur','$prenom_utilisateur','$email_utilisateur','$mdp_utilisateur','$role_utilisateur','$organisme_utilisateur','$donnees_utilisateur')";
        $result = mysqli_query($link, $requete) or die (mysqli_error($link)); //exécution de la requête
        ?>
    <h1>Devenez membre de MAIAT</h1>

    <p>&nbsp;</p>

    <h3>Vous etes bien inscrit ! </h3>

    <p> Maintenant vous pouvez vous  <a href="identification.php">Connecter</a></p>

    <?php }
            else
    {
       header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php?erreur=1'); // utilisateur ou mot de passe vide
    }?>


</body>
</html>