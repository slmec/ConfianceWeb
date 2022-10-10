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
    include('HautDePage.php')
	  ?>

    <h1>Espace Membre</h1>
    <p>&nbsp;</p>

    <h4> Vos information personnelles : </h4>

    <form action = "modification.php" method="post">
        <p> Nom : <?php echo $_SESSION['nom'] ?>    
            <input type="text" placeholder="Modifier mon nom" name="new_nom">
        </p>
        <p> Prénom : <?php echo $_SESSION['prenom'] ?>
            <input type="text" placeholder="Modifier mon prenom" name="new_prenom">
        </p>
        <p> Rôle dans l'intégration du système à base d'IA  : <?php echo $_SESSION['role'] ?>
            <input type="text" placeholder="Modifier mon rôle" name="new_role">
        </p>
        <p> Organisme : <?php echo $_SESSION['organisme'] ?>
            <input type="text" placeholder="Modifier mon organise" name="new_organisme">
        </p>
        <input class="learn-more-btn" type="submit" id='submit' value='Valider la modification' >
    </form>

    <?php
          if(isset($_GET['erreur'])){
              $err = $_GET['erreur'];
              if($err==1 || $err==2)
                  echo "<p style='color:red'> Tous les champs sont vides</p>";
          }
          ?>

    <p>&nbsp;</p>
    <form action = "profil.php">
			<input type="submit" value="Retour sur le profil"> 
		</form>
    <form action = "Controleur/connexion.php">
			<input type="submit" value="Retour sur l'accueil de connexion"> 
		</form>

    <?php
    include('BasDePage.php')
	?>
</body>
</html>