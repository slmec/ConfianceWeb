<?php
    // connexion à la base de données
    include("../Modele/connexion_bdd.php");
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');

    if(isset($_POST['Email']) && isset($_POST['MotDePasse'])){
        // connexion à la base de données
        include("../Modele/connexion_bdd.php");

        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $Email = mysqli_real_escape_string($db,htmlspecialchars($_POST['Email']));
        $MotDePasse = mysqli_real_escape_string($db,htmlspecialchars($_POST['MotDePasse']));
        $requete = "SELECT MotDePasse FROM Utilisateurs WHERE Email = '$Email'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $mdp_hash = $reponse['MotDePasse'];

        if($Email !== "" && $MotDePasse !== ""){
            $requete = "SELECT count(*) FROM Utilisateurs where Email = '".$Email."'";
            $exec_requete = mysqli_query($db,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            if($count!=0){ //utilisateur existe
                if(password_verify($MotDePasse,$mdp_hash)){
                    $requete = "SELECT Id_utilisateur, Nom, Prenom, Role, Organisme, StockageDonnees FROM Utilisateurs WHERE Email = '$Email'";
                    $resultat = mysqli_query($db,$requete);
                    $row = mysqli_fetch_assoc($resultat) ;

                    $_SESSION['Id_utilisateur']=$row['Id_utilisateur'];
                    $_SESSION['Nom']=$row['Nom'];
                    $_SESSION['Email'] = $Email;
                    $_SESSION['MotDePasse'] = $MotDePasse;
                    $_SESSION['Prenom']=$row['Prenom'];
                    $_SESSION['Role']=$row['Role'];
                    $_SESSION['Organisme']=$row['Organisme'];
                    $_SESSION['StockageDonnees']=$row['StockageDonnees'];
                    header('Location: ../Controleur/connexion.php');
                }
                else {
                    header('Location: ../Controleur/identification.php?erreur=3');
                }
            }
            else{
               header('Location: ../Controleur/identification.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        }
        else{
           header('Location: ../Controleur/identification.php?erreur=2'); // utilisateur ou mot de passe vide
        }
    }
    else{
       header('Location: ../Controleur/identification.php');
    }
?>