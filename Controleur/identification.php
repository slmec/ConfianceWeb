<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body>
<section>
    <div class="container">
        <header>
            <nav class="navbar">
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
            </nav>
        </header>
    </div>
    <div class ="block_page">
        <div class ="block_titre">
            <h1>Espace de connexion</h1>
            <br>
        </div>
        <div class ="block_form">
        <form action="../Modele/verification.php" method="POST">

              <p>Email :&nbsp; <input type="text" placeholder="Entrer le mail de connexion" name="email_Utilisateur" required> </p>
              <p>Mot de passe :&nbsp;<input type="password" placeholder="Entrer le mot de passe" name="mdp_Utilisateur" required> </p>
              <input class="learn-more-btn" type="submit" id='submit' value='Connexion' >

        </form>
        </div>

        <br>
        <div class="erreur">
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:#ffffff'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </div>
    </div>
    <div class="bas">
        <br>
        <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
        <br>
    </div>

</section>
</body>
</html>