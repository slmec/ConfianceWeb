<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body>
<section>
    <div class="container">
        <header>
            <nav class="navbar">
                <a href="../index.php" target="_blank" > MAIAT </a>
                <a class="active" href="inscription.php">Inscription</a>
                <a href="identification.php">Connexion</a>
                <a href="testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
            </nav>
        </header>
    </div>
    <div class="block_page">
        <div class="block_titre">
            <h1>Devenez membre de MAIAT</h1>
            <br>
        </div>
        <div class="block_form">
            <form action="inscription2.php" method="post" name="profil" target="_self">
                <h3>Formulaire d&#39;inscription :</h3>
                <p>Nom :&nbsp;<input maxlength="250" name="nom_utilisateur" type="text" /></p>

                <p>Prenom :&nbsp;<input maxlength="250" name="prenom_utilisateur" type="text" /></p>

                <p>Email :&nbsp;<input name="email_utilisateur" type="text" /></p>

                <p>Mot de passe :&nbsp;</p>
                <p> ATTENTION ! Nous sommes en phase de test donc pour une question de sécurité ne choisissez pas de mot de passe confidentiel !<input name="mdp_utilisateur" type="password" /></p>

                <p>Mon rôle dans l'intégration du système à base d'IA :&nbsp;<input name="role_utilisateur" type="text" /></p>

                <p>Mon organisation :&nbsp;<input name="organisme_utilisateur" type="text" /></p>

                <!-- <p><input type="checkbox" name="donnees_utilisateur" value="1" />&nbsp;J&#39;accepte le traitement et l&#39;utilisation de mes donn&eacute;es</p> -->

                <p><input name="s'inscrire" type="submit" value="S'inscrire" /></p>
            </form>
        </div>
        <br>
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