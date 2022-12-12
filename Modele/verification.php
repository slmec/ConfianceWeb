<?php
    session_start();
    if(isset($_POST['email_Utilisateur']) && isset($_POST['mdp_Utilisateur'])){
        // connexion à la base de données
        include("../Modele/connexion_bdd.php");

        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $email_Utilisateur = mysqli_real_escape_string($db,htmlspecialchars($_POST['email_Utilisateur']));
        $mdp_Utilisateur = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp_Utilisateur']));
        $requete = "SELECT MotDePasse FROM Utilisateurs WHERE Email = '$email_Utilisateur'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $mdp_hash = $reponse['MotDePasse'];


        if($email_Utilisateur !== "" && $mdp_Utilisateur !== ""){
            $requete = "SELECT count(*) FROM Utilisateurs where Email = '".$email_Utilisateur."'";
            $exec_requete = mysqli_query($db,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            if($count!=0){ //utilisateur existe
                if(password_verify($mdp_Utilisateur,$mdp_hash)){
                    $requete = "SELECT Id_utilisateur, Nom, Prenom, Roles, Organisme, Données FROM Utilisateurs WHERE Email = '$email_Utilisateur'";
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
                else {
                    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php?erreur=3');
                }
            }
            else{
               header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        }
        else{
           header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php?erreur=2'); // utilisateur ou mot de passe vide
        }
    }
    else{
       header('Location: identification.php');
    }
    mysqli_close($db); // fermer la connexion
?>