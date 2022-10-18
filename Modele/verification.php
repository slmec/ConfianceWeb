<?php
session_start();
if(isset($_POST['email_Utilisateur']) && isset($_POST['mdp_Utilisateur']))
{
    // connexion à la base de données
    $db_username = 'eleve.tou';
    $db_password = 'et*301';
    $db_name     = 'Confiance';
    $db_host     = 'localhost';

    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $email_Utilisateur = mysqli_real_escape_string($db,htmlspecialchars($_POST['email_Utilisateur'])); 
    $mdp_Utilisateur = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp_Utilisateur']));
    
    if($email_Utilisateur !== "" && $mdp_Utilisateur !== "")
    {
        $requete = "SELECT count(*) FROM Utilisateurs where 
              Email = '".$email_Utilisateur."' and MotDePasse = '".$mdp_Utilisateur."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {   $requete = "SELECT Id_utilisateur, Nom, Prenom, Roles, Organisme, Données FROM Utilisateurs WHERE Email = '$email_Utilisateur' AND MotDePasse = '$mdp_Utilisateur' ";
            $resultat = mysqli_query($db,$requete);
            $row = mysqli_fetch_assoc($resultat) ;

           $_SESSION['id_Utilisateur']=$row['Id_utilisateur'];
           $_SESSION['nom']=$row['Nom'];
           $_SESSION['email_Utilisateur'] = $email_Utilisateur;
           $_SESSION['mdp_Utilisateur'] = $mdp_Utilisateur;
           $_SESSION['prenom']=$row['Prenom'];
           $_SESSION['role']=$row['Roles'];
           $_SESSION['organisme']=$row['Organisme'];
           $_SESSION['donnees']=$row['Données'];
           header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/connexion.php');
        }
        else
        {
           header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: identification.php');
}
mysqli_close($db); // fermer la connexion
?>