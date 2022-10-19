<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
  <?php 
   $db =  mysqli_connect("localhost", "eleve.tou", "et*301");
   
   mysqli_select_db($db, "Confiance" );
    if ( ! $db ) die( "Impossible de se connecter à MySQL" );
?>
</head>
<body>
    <?php
        $nom_utilisateur = $_POST['nom_utilisateur'];
        $prenom_utilisateur = $_POST['prenom_utilisateur'];
        $email_utilisateur = $_POST['email_utilisateur'];
        $mdp_utilisateur = $_POST['mdp_utilisateur'];
        /*$mdp_utilisateur_hash = password_hash($mdp_utilisateur,PASSWORD_DEFAULT);*/
        $role_utilisateur = $_POST['role_utilisateur'];
        $organisme_utilisateur = $_POST['organisme_utilisateur'];

        if($nom_utilisateur !== "" && $prenom_utilisateur !== "" && $email_utilisateur !== "" && $mdp_utilisateur !== "" && $role_utilisateur !== "" && $organisme_utilisateur !== ""){
            $result = mysqli_query($db,"SELECT Email FROM Utilisateurs WHERE Email = '".$email_utilisateur."'");
            $respond = mysqli_fetch_assoc($result);
            if ($respond['Email'] == $email_utilisateur){
                header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php?erreur=2');
            }
            else{
                if (isset($_POST['donnees_utilisateur'])){
                    $donnees_utilisateur = $_POST['donnees_utilisateur'];
                    $requete = "INSERT INTO Utilisateurs VALUES ('','$nom_utilisateur','$prenom_utilisateur','$email_utilisateur','$mdp_utilisateur','$role_utilisateur','$organisme_utilisateur','$donnees_utilisateur')";
                    $result2 = mysqli_query($db, $requete) or die (mysqli_error($db)); //exécution de la requête
                }
                else{
                    $requete2 = "INSERT INTO Utilisateurs VALUES ('','$nom_utilisateur','$prenom_utilisateur','$email_utilisateur','$mdp_utilisateur','$role_utilisateur','$organisme_utilisateur','')";
                    $result3 = mysqli_query($db, $requete2) or die (mysqli_error($db));
                }
            }
    ?>
    <h1>Devenez membre de MAIAT</h1>
    <p>&nbsp;</p>
    <h3>Vous etes bien inscrit ! </h3>
    <p> Maintenant vous pouvez vous  <a href="identification.php">Connecter</a></p>
    <?php
        }
        else{
           header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php?erreur=1'); // utilisateur ou mot de passe vide
        }
    ?>
</body>
</html>