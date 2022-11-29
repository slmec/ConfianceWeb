<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MAIAT</title>
        <link rel="stylesheet" href="../Vue/style_cest_a_vous.css" />
        <?php
           $db =  mysqli_connect("localhost", "eleve.tou", "et*301");
           mysqli_select_db($db, "Confiance" );
           if ( ! $db ) die( "Impossible de se connecter à MySQL" );
        ?>
    </head>
    <body>
        <section>
            <div class="container">
                <header>
                    <nav class="navbar">
                        <a href="../index.php" target="_blank" > MAIAT </a>
                        <a class="active" href="inscription.php">Inscription</a>
                        <a href="identification.php">Connexion</a>
                        <a href="testquestionnaire_sansid.php">Diagnostic sans compte</a>
                        <a href="diagnostic_horsconnexion.php">Diagnostic hors ligne</a>
                    </nav>
                </header>
        </section>
        <?php
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $prenom_utilisateur = $_POST['prenom_utilisateur'];
            $email_utilisateur = $_POST['email_utilisateur'];
            $mdp_utilisateur_nonhash = $_POST['mdp_utilisateur'];
            $mdp_utilisateur = password_hash($mdp_utilisateur_nonhash,PASSWORD_DEFAULT);
            $role_utilisateur = $_POST['role_utilisateur'];
            $organisme_utilisateur = $_POST['organisme_utilisateur'];

            if($nom_utilisateur !== "" && $prenom_utilisateur !== "" && $email_utilisateur !== "" && $mdp_utilisateur !== "" && $role_utilisateur !== "" && $organisme_utilisateur !== ""){
                $result = mysqli_query($db,"SELECT Email FROM Utilisateurs WHERE Email = '".$email_utilisateur."'");
                $respond = mysqli_fetch_assoc($result);
                if ($respond['Email'] == $email_utilisateur){
                    header('Location: inscription.php?erreur=2');
                }
                else{
                    if (isset($_POST['donnees_utilisateur'])){
                        $donnees_utilisateur = $_POST['donnees_utilisateur'];
                        $requete = "INSERT INTO Utilisateurs VALUES ('','$nom_utilisateur','$prenom_utilisateur','$email_utilisateur','$mdp_utilisateur','$role_utilisateur','$organisme_utilisateur','$donnees_utilisateur')";
                        $result2 = mysqli_query($db, $requete) or die (mysqli_error($db)); //exécution de la requête
                    }
                    else{
                        $requete2 = "INSERT INTO Utilisateurs VALUES ('','$nom_utilisateur','$prenom_utilisateur','$email_utilisateur','$mdp_utilisateur','$role_utilisateur','$organisme_utilisateur','')";
                        $result3 = mysqli_query($db, $requete2) or die (mysqli_error($db));
                    }
                }
        ?>
                <?php
            }
            else{
                header('Location: inscription.php?erreur=1'); // utilisateur ou mot de passe vide
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