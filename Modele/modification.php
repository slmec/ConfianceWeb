<!DOCTYPE html>
<?php
    session_start();
    $link =  mysqli_connect("localhost", "eleve.tou", "et*301");
   
    mysqli_select_db($link, "Confiance" );
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
    <?php
        //$new_prenom = $_POST['new_prenom'];
        //$new_role = $_POST['new_role'];
        //$new_organisme = $_POST['new_organisme']; 
        if($_POST['new_nom'] !== "")
        {
          $new_nom = $_POST['new_nom'];
          $requete = "UPDATE Utilisateurs SET Nom = '$new_nom'  WHERE Id_utilisateur = '$Id_Utilisateur' ";
          $result =mysqli_query( $link, $requete );//or //die (mysqli_error($link));
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php');
        }
        if($_POST['new_prenom'] !== "")
        {
          $new_prenom = $_POST['new_prenom'];
          $requete = "UPDATE Utilisateurs SET Prenom = '$new_prenom'  WHERE Id_utilisateur = '$Id_Utilisateur' ";
          $result =mysqli_query( $link, $requete );//or //die (mysqli_error($link));
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php');
        }
        if($_POST['new_role'] !== "")
        {
            $new_role = $_POST['new_role'];
            $requete = "UPDATE Utilisateurs SET Roles = '$new_role'  WHERE Id_utilisateur = '$Id_Utilisateur' ";
            $result =mysqli_query( $link, $requete );//or //die (mysqli_error($link));
              header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php');
          }
        if($_POST['new_organisme'] !== "")
        {
            $new_organisme = $_POST['new_organisme'];
            $requete = "UPDATE Utilisateurs SET Organisme = '$new_organisme'  WHERE Id_utilisateur = '$Id_Utilisateur' ";
            $result =mysqli_query( $link, $requete );//or //die (mysqli_error($link));
              header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php');
        }         
        if($_POST['new_organisme'] == "" && $_POST['new_nom'] == "" && $_POST['new_prenom'] == "" &&$_POST['new_role'] == "")
        {
            header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/modifierprofil.php?erreur=1'); // utilisateur ou mot de passe vide
        }
        
    ?>

    <?php
        mysqli_close( $link );
    ?>
</body>
</html>
            