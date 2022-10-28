<!DOCTYPE html>
<?php
    session_start();
    $link =  mysqli_connect("localhost", "eleve.tou", "et*301");
   
    mysqli_select_db($link, "Confiance" );
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
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php" target="_blank" > MAIAT </a>
                <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/acceuil.php">Accueil</a>
                <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php">Connexion</a>
                <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
            </nav>
        </header>
        <div class="block_tableau">
            <br><hr><br>
        </div>
        <nav class="navbar">
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_new.php"> Nouveau Diagnostic </a>
            <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/diagnostic_suivi.php">Consulter mes diagnostics</a>
            <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/profil.php">Mon profil </a>
            <a href="../Modele/deconnexion.php">Deconnexion</a>
        </nav>
        <div class="block_tableau">
            <br><hr><br>
            <h1 class="blanc">Modifier le profil </h1>
            <br><hr><br>
        </div>
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
</section>

</body>
</html>