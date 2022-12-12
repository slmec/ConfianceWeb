<!DOCTYPE html>
<?php
    session_start();
    $db_username = 'eleve.tou';
    $db_password = 'et*301';
    $db_name     = 'Confiance';
    $db_host     = 'localhost';

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
                <a class="active" href="diagnostic_suivi.php">Consulter mes diagnostics</a>
                <a href="profil.php">Mon profil </a>
                <a href="../Modele/deconnexion.php">Deconnexion</a>
            </div>
            <div class="block_tableau">
                <br><hr><br>
                <h1 class="blanc">Vos diagnostics </h1>
                <br><hr><br>
            </div>
            <div class="block_page">
                <div class="block_form">
                    <form action="comparaison_diagnostic2.php" method="post" target="_self">
                        <?php
                            $id_utilisateur = $_SESSION['id_Utilisateur'];
                            $resultat = mysqli_query($db, "SELECT  a.Nom, b.Prenom,a.Id_critere FROM Criteres a, Utilisateurs b NATURAL JOIN Repondre c WHERE c.Id_critere = a.Id_critere AND c.Id_utilisateur = '$id_utilisateur'") or die ( "<br>BUG".mysqli_error($db));
                            $resultat2 = mysqli_query($db, "SELECT a.Prenom FROM Utilisateurs a NATURAL JOIN Repondre b WHERE b.Id_utilisateur = '$id_utilisateur'") or die ( "<br>BUG".mysqli_error($db));
                            $row = mysqli_fetch_assoc($resultat2);
                        ?>
                            <h4> Sélectionnez le ou les diagnostics que vous souhaitez comparer : </h4>
                        <?php
                            while ($uneLigne=mysqli_fetch_assoc($resultat)){
                                ?>
                                <!--<tr>-->
                                   <br>
                                <div class="ndiag">
                                    Diagnostic
                                    <?=$uneLigne['Nom'];?>

                                <input type="checkbox" name="adv[]" value="<?=$uneLigne['Id_critere'];?>" />
                                </div>
                                <?php
                                }
                        ?>
                        <br><br>
                        <button type="submit" name="ok">Afficher</button>
                    </form>
                </div>
                <br>
                <div class="erreur">
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:#ffffff'>Veuillez selectionner entre 1 et 3 diagnostics </p>";
                    }
                    ?>
                </div>
            <!--$rq = "INSERT INTO `Repondre` VALUES ('$Id_Utilisateur', '$Id_Critere')" ;
            //$result =mysqli_query( $db, $rq )or die (mysqli_error($link));


            //$requete = "SELECT Id_critere FROM Repondre WHERE Id_utilisateur =$Id_Utilisateur ";
            //$resultat = mysqli_query($db,$requete);
            //$row = mysqli_fetch_assoc($resultat) ;

            //$_SESSION['id_Critere']=$row['Id_critere'];
            //echo $_SESSION['id_Critere'];
            //echo $_SESSION['id_Utilisateur']; -->
                <div class="bas">
                    <br>
                    <p class="bas">Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
                    <br>
                </div>
            </div>
        </div>
    </section>
</body>
</html>