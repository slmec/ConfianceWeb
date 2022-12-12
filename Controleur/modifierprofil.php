<!DOCTYPE html>
<?php
    include("../Modele/connexion_bdd.php");
    $link =  mysqli_connect("localhost", "eleve.tou", "et*301");
    mysqli_select_db($link, "Confiance" );
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MAIAT</title>
    <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
</head>
<body background="../Medias/background_v2.jpg">
    <section>
        <div class="container">
            <header>
                <div class="left">
                    <a href="https://www.confiance.ai/" class="logo" target="_blank"><img src="../Medias/logoconfiance.jpg" width="150" height="106"></a>
                </div>
                <div class="middle">
                    <nav class="navbar">
                        <a href="../index.php" target="_blank" > MAIAT </a>
                        <a href="inscription.php">Inscription</a>
                        <a class="active" href="identification.php">Connexion</a>
                        <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                        <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                    </nav>
                </div>
                <div class="right">
                    <a href="https://www.icam.fr/" class="logo" target="_blank"><img src="../Medias/logo_icam_blanc.png" width="243" height="150" ></a>
                </div>
            </header>
            <div class="block_tableau">
                <br><hr><br>
            </div>
            <div class="navbar_deux">
                <a href="diagnostic_new.php"> Nouveau Diagnostic </a>
                <a href="diagnostic_suivi.php">Consulter mes diagnostics</a>
                <a class="active" href="profil.php">Mon profil </a>
                <a href="../Modele/deconnexion.php">Deconnexion</a>
            </div>
            <div class="block_tableau">
                <br><hr><br>
                <h1 class="blanc">Modifier le profil </h1>
                <br><hr><br>
            </div>
            <div class="block_page">
                <div class="block_form">



                    <form action = "../Modele/modification.php" method="post">
                        <h4> Vos information personnelles : </h4>
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
                            <input type="text" placeholder="Modifier mon organisation" name="new_organisme">
                        </p>
                        <input class="learn-more-btn" type="submit" id='submit' value='Valider la modification' >

                    </form>
                    <br>
                    <form action = "profil.php">
                        <input type="submit" value="Retour sur le profil" onclick="profil.php">
                    </form>
                </div>
                <br>
                <div class="erreur">
                    <?php
                          if(isset($_GET['erreur'])){
                              $err = $_GET['erreur'];
                              if($err==1 || $err==2)
                                  echo "<p style='color:#ffffff'> Tous les champs sont vides</p>";
                          }
                          ?>
                </div>
            </div>
            <div class="bas">
                    <br>
                    <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                    <br>
            </div>
        </div>
    </section>
</body>
</html>