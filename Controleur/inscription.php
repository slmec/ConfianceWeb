<!DOCTYPE html>
<?php include("../Modele/connexion_bdd.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                            <a class="active" href="inscription.php">Inscription</a>
                            <a href="identification.php">Connexion</a>
                            <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                            <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                        </nav>
                    </div>
                    <div class="right">
                        <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                    </div>
                </header>
                <!-- Corps de la page !-->
                <div class="block_page">
                    <div class="block_titre">
                        <h1>Devenez membre de MAIAT</h1>
                        <br>
                    </div>
                    <!-- Formulaire d'inscription !-->
                    <div class="block_form">
                        <form action="inscription2.php" method="post" name="profil" target="_self">
                            <h3>Formulaire d&#39;inscription :</h3>
                            <p>Nom :&nbsp;<input maxlength="250" name="nom_utilisateur" type="text" /></p>
                            <p>Prenom :&nbsp;<input maxlength="250" name="prenom_utilisateur" type="text" /></p>
                            <p>Email :&nbsp;<input name="email_utilisateur" type="text" /></p>
                            <p>Mot de passe :&nbsp;</p>
                            <p> <input name="mdp_utilisateur" type="password" /></p>
                            <p>Mon rôle dans l'intégration du système à base d'IA :&nbsp;<input name="role_utilisateur" type="text" /></p>
                            <p>Mon organisation :&nbsp;<input name="organisme_utilisateur" type="text" /></p>
                            <p> <input type="radio" name="Données" value="1" > J'accepte que mes données soient stockées </p>
                            <p><input name="s'inscrire" type="submit" value="S'inscrire" /></p>
                        </form>
                    </div>
                    <br>
                    <!-- Contrôle des erreurs !-->
                    <div class="erreur">
                        <?php
                            if(isset($_GET['erreur'])){
                                $err = $_GET['erreur'];
                                if($err==1 ){
                                    echo "<p style='color:#ffffff'>Vous n'avez pas rempli tous les champs</p>";
                                }
                                elseif($err==2){
                                    echo "<p style='color:#ffffff'>Email déjà utilisée, veuillez en choisir un nouveau</p>";
                                }
                                elseif($err==3){
                                    echo "<p style='color:#ffffff'>Si vous n'acceptez pas le stockage de vos données, il est impossible de se créer un compte</p>";
                                }
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