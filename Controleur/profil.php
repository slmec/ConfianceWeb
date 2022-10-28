<!DOCTYPE html>
    <?php
        session_start();
        $db_username = 'eleve.tou';
        $db_password = 'et*301';
        $db_name     = 'Confiance';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
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
                        <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/index.php"> MAIAT </a>
                        <a href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/acceuil.php">Accueil</a>
                        <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/inscription.php">Inscription</a>
                        <a class="active" href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/identification.php" target="_blank">Connexion</a>
                        <a  href="https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/testquestionnaire_sansid.php">Diagnostic sans connexion</a>
                    </nav>
                </header>
                <div class="profil">
                    <div class="titre_profil">
                        <h1>Espace Membre</h1>
                    </div>
                    <div class="contenu_profil">
                        <p>&nbsp;</p>
                        <h3>Bienvenue sur votre profil </h3>
                        <h4> Vos information personnelles : </h4>
                        <?php
                            $Id_Utilisateur = $_SESSION['id_Utilisateur'];
                            $requete = "SELECT Nom, Prenom, Roles, Organisme FROM Utilisateurs WHERE Id_utilisateur =$Id_Utilisateur ";
                            $resultat = mysqli_query($db,$requete);
                            $row = mysqli_fetch_assoc($resultat) ;

                            $_SESSION['nom']=$row['Nom'];
                            $_SESSION['prenom']=$row['Prenom'];
                            $_SESSION['role']=$row['Roles'];
                            $_SESSION['organisme']=$row['Organisme'];
                        ?>
                        <form action = "modifierprofil.php">
                            <p> Nom : <?= $_SESSION['nom'] ?>    </p>
                            <p> Prénom : <?= $_SESSION['prenom'] ?>  </p>
                            <p> Rôle dans l'intégration du système à base d'IA  : <?= $_SESSION['role'] ?>  </p>
                            <p> Organisation : <?= $_SESSION['organisme'] ?>  </p>
                            <input type="submit" value="Modifier mes informations">
                        </form>
                        <form action = "connexion.php">
                            <input type="submit" value="Retour au tableau de bord" >
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>