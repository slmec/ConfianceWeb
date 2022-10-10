<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title></title>
</head>
<body>
    <?php
    include('../Vue/HautDePage.php')
	?>

    <h1>MAIAT : Espace de connexion&nbsp;</h1>

    <p>&nbsp;</p>

    <h3>Se connecter&nbsp;</h3>

    <form action="../Modele/verification.php" method="POST">
          <h1>Connexion</h1>
          
          <p>Email :&nbsp; <input type="text" placeholder="Entrer le nom d'utilisateur" name="email_Utilisateur" required> </p>
          <p>Mot de passe :&nbsp;<input type="password" placeholder="Entrer le mot de passe" name="mdp_Utilisateur" required> </p>
          <input class="learn-more-btn" type="submit" id='submit' value='Connexion' >
        
          <?php
          if(isset($_GET['erreur'])){
              $err = $_GET['erreur'];
              if($err==1 || $err==2)
                  echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
          }
          ?>
    
    <h3>S&#39;inscrire&nbsp;</h3>

    <p>Vous n&#39;&ecirc;tes pas encore inscrit ? <a href="inscription.php">Inscrivez-vous</a></p>

    <p>&nbsp;</p>

    <p>Vous souhaitez proc&eacute;der au test sans avoir de trace ? <a href="sansidentification.php">Cliquez-ici</a></p>

    <p>Vous ne souhaitez plus r&eacute;aliser le diagnostic ? <a href="../index.php">Retourner &agrave; l&#39;accueil</a></p>

    <?php
    include('../Vue/BasDePage.php')
        ?>
</body>
</html>