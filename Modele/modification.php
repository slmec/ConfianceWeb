<!DOCTYPE html>
<?php
// connexion à la base de données
    include("../Modele/connexion_bdd.php");
    $db_username = $_SESSION['db_username'];
    $db_password = $_SESSION['db_password'];
    $db_name = $_SESSION['db_name'];
    $db_host = $_SESSION['db_host'];
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MAIAT</title>
    </head>
    <body>
        <?php
            $Id_utilisateur = $_SESSION['Id_utilisateur'];
        ?>
        <?php
        /* Modification du nom */
            if($_POST['new_nom'] !== ""){
                $new_nom = $_POST['new_nom'];
                $requete = "UPDATE Utilisateurs SET Nom = '$new_nom'  WHERE Id_utilisateur = '$Id_utilisateur' ";
                $result =mysqli_query( $db, $requete );//or //die (mysqli_error($link));
                header('Location: ../Controleur/profil.php');
            }
        /* Modification du prenom */
            if($_POST['new_prenom'] !== "") {
                $new_prenom = $_POST['new_prenom'];
                $requete = "UPDATE Utilisateurs SET Prenom = '$new_prenom'  WHERE Id_utilisateur = '$Id_utilisateur' ";
                $result =mysqli_query( $db, $requete );//or //die (mysqli_error($link));
                header('Location: ../Controleur/profil.php');
            }
        /* Modification du role */
            if($_POST['new_role'] !== "") {
                $new_role = $_POST['new_role'];
                $requete = "UPDATE Utilisateurs SET Role = '$new_role'  WHERE Id_utilisateur = '$Id_utilisateur' ";
                $result =mysqli_query( $db, $requete );//or //die (mysqli_error($link));
                header('Location: ../Controleur/profil.php');
            }
        /* Modification de l'organisme */
            if($_POST['new_organisme'] !== "") {
                $new_organisme = $_POST['new_organisme'];
                $requete = "UPDATE Utilisateurs SET Organisme = '$new_organisme'  WHERE Id_utilisateur = '$Id_utilisateur' ";
                $result =mysqli_query( $db, $requete );//or //die (mysqli_error($link));
                header('Location: ../Controleur/profil.php');
            }
            if($_POST['new_organisme'] == "" && $_POST['new_nom'] == "" && $_POST['new_prenom'] == "" &&$_POST['new_role'] == "") {
                header('Location: ../modifierprofil.php?erreur=1'); // utilisateur ou mot de passe vide
            }
            mysqli_close( $db );
        ?>
    </body>
</html>
            