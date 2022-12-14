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
        </section>
        <?php
        /* Récupération des variables */
            $Nom = $_POST['Nom'];
            $Prenom = $_POST['Prenom'];
            $Email = $_POST['Email'];
            $mdp_utilisateur_nonhash = $_POST['MotDePasse'];
            $MotDePasse = password_hash($mdp_utilisateur_nonhash,PASSWORD_DEFAULT);
            $Role = $_POST['Role'];
            $Organisme = $_POST['Organisme'];
            $StockageDonnees = $_POST['StockageDonnees'];

        /* Ajout dans BDD si accepte le traitement des données */
            if ($StockageDonnees == 1) {
            if($Nom !== "" && $Prenom !== "" && $Email !== "" && $MotDePasse !== "" && $Role !== "" && $Organisme !== ""){
                $result = mysqli_query($db,"SELECT Email FROM Utilisateurs WHERE Email = '".$Email."'");
                $respond = mysqli_fetch_assoc($result);
                if ($respond['Email'] == $Email){
                    header('Location: inscription.php?erreur=2');
                }
                else{
                    if (isset($_POST['StockageDonnees'])){
                        $StockageDonnees = $_POST['StockageDonnees'];
                        $requete = "INSERT INTO Utilisateurs VALUES ('','$Nom','$Prenom','$Email','$MotDePasse','$Role','$Organisme','$StockageDonnees')";
                        $result2 = mysqli_query($db, $requete) or die (mysqli_error($db)); //exécution de la requête
                    }
                    else{
                        $requete2 = "INSERT INTO Utilisateurs VALUES ('','$Nom','$Prenom','$Email','$MotDePasse','$Role','$Organisme','')";
                        $result3 = mysqli_query($db, $requete2) or die (mysqli_error($db));
                    }
                }
                ?>
                <?php
            }
            else{
                header('Location: inscription.php?erreur=1'); // utilisateur ou mot de passe vide
            }

        }
            else{
                header('Location: inscription.php?erreur=3'); // stockage donnees
            }
        ?>
        <section>
                <div class="block_tableau">
                    <br><hr><br>
                    <h1 class="blanc">Vous etes bien inscrit !</h1>
                    <h3 class="blanc"> Maintenant vous pouvez vous connecter</h3>
                    <br><hr><br>
                </div>
            </div>
        </section>
    </body>
</html>