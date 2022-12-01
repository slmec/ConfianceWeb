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
    <body background="../Medias/background_v2.jpg">
        <section>
            <div class="container">
                <header>
                    <nav class="navbar">
                        <a href="../index.php" target="_blank" > MAIAT </a>
                        <a href="inscription.php">Inscription</a>
                        <a class="active" href="identification.php">Connexion</a>
                        <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                        <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
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
                            if($err==1)
                                echo "<p style='color:#ffffff'>Utilisateur ou mot de passe incorrect</p>";
                            if($err==2)
                                echo "<p style='color:#ffffff'>Utilisateur ou mot de passe vide</p>";
                            if($err==3){
                                echo "<p style='color:#ffffff'>Utilisateur ou mot de passe incorrect</p>";}
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