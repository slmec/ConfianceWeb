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
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MAIAT</title>
        <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
    </head>
    <body background="../Medias/background_v2.jpg">
        <section>
            <div class="container">
                <!-- Barre de navigation !-->
                <header>
                    <div class="left">
                        <a href="https://www.confiance.ai/" class="logo" target="_blank"><img src="../Medias/logoconfiance.jpg" width="150" height="106"></a>
                    </div>
                    <div class="middle">
                        <nav class="navbar">
                            <a href="../index.php" target="_blank" > MAIAT </a>
                            <a  href="inscription.php">Inscription</a>
                            <a class="active" href="identification.php">Connexion</a>
                            <a  href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                            <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                        </nav>
                    </div>
                    <div class="right">
                        <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                    </div>
                </header>

                <!-- Corps de la page !-->
                <div class ="block_page">
                    <!-- Titre de la page !-->
                    <div class ="block_titre">
                        <h1>Espace de connexion</h1>
                        <br>
                    </div>
                    <!-- Formulaire de connexion !-->
                    <div class ="block_form">
                    <form action="../Modele/verification.php" method="POST">
                          <p>Email :&nbsp; <input type="text" placeholder="Entrer le mail de connexion" name="email_Utilisateur" required> </p>
                          <p>Mot de passe :&nbsp;<input type="password" placeholder="Entrer le mot de passe" name="mdp_Utilisateur" required> </p>
                          <input class="learn-more-btn" type="submit" id='submit' value='Connexion' >
                    </form>
                    </div>
                    <br>
                    <!-- Contrôle des erreurs !-->
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
                <!-- Bas de page !-->
                <div class="bas">
                    <br>
                    <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                    <br>
                </div>
            </div>
        </section>
    </body>
</html>