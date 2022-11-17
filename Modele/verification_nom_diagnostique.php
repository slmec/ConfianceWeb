<?php
    session_start();
    // connexion à la base de données
    $db_username = 'eleve.tou';
    $db_password = 'et*301';
    $db_name     = 'Confiance';
    $db_host     = 'localhost';

    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');

    // diagnostic_new.php
        if(isset($_POST['Nom_Diagnostic'])){
            $_SESSION['Nom_Diagnostic'] = $_POST['Nom_Diagnostic'];
            $Nom_Diagnostic = $_SESSION['Nom_Diagnostic'];
            $email_Utilisateur = $_SESSION['email_Utilisateur'];
            $mdp_Utilisateur = $_SESSION['mdp_Utilisateur'];

            $resultat = mysqli_query($db, "SELECT Id_utilisateur FROM Utilisateurs WHERE Email = '".$email_Utilisateur."' AND MotDePasse = '".$mdp_Utilisateur."'");
            $row = (mysqli_fetch_assoc($resultat));
            $Id_Utilisateur = $row['Id_utilisateur'];
            $resultat2 = mysqli_query($db, "SELECT a.Nom FROM Criteres a NATURAL JOIN Repondre b WHERE b.Id_utilisateur = '".$Id_Utilisateur."' AND b.Id_critere = a.Id_critere AND a.Nom = '".$Nom_Diagnostic."'");

            if ($Nom_Diagnostic !== ""){
                $test = mysqli_fetch_assoc($resultat2);
                if ($test['Nom'] == $Nom_Diagnostic){
                    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php?erreur=2');
                }
                else{
                    header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Questions_prequestionnaire.php');
                }
            }
            else {
                header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php?erreur=1'); // nom du diagnostic vide
            }
        }
        else{
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php?');
        }
    mysqli_close($db); // fermer la connexion
?>
