<!DOCTYPE html>
<?php include("../Modele/connexion_bdd.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MAIAT</title>
    </head>
    <body onload="init();">
        <?php
        mysqli_select_db($db, "Confiance" );
        if ( ! $db ) die( "Impossible de se connecter à MySQL" );

        /* Recuperation des variables */
        $Id_Critere = $_SESSION['id_Critere'];

        $C1Q1_interpretation = $_POST['C1Q1_interpretation'];
        $C1Q1_plan_action = $_POST['C1Q1_plan_action'];
        $C1Q2_interpretation = $_POST['C1Q2_interpretation'];
        $C1Q2_plan_action = $_POST['C1Q2_plan_action'];
        $C1Q3_interpretation = $_POST['C1Q3_interpretation'];
        $C1Q3_plan_action = $_POST['C1Q3_plan_action'];
        $C1Q4_interpretation = $_POST['C1Q4_interpretation'];
        $C1Q4_plan_action = $_POST['C1Q4_plan_action'];

        //C1
        if ($C1Q1_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C1Q1_plan_action ='$C1Q1_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C1Q1_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C1Q1_interpretation ='$C1Q1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C1Q2_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C1Q2_plan_action ='$C1Q2_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C1Q2_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C1Q2_interpretation ='$C1Q2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C1Q3_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C1Q3_plan_action ='$C1Q3_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C1Q3_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C1Q3_interpretation ='$C1Q3_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C1Q4_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C1Q4_plan_action ='$C1Q4_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C1Q4_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C1Q4_interpretation ='$C1Q4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        /* Recuperation des variables */
        $C2Q1_interpretation = $_POST['C2Q1_interpretation'];
        $C2Q1_plan_action = $_POST['C2Q1_plan_action'];
        $C2Q2_interpretation = $_POST['C2Q2_interpretation'];
        $C2Q2_plan_action = $_POST['C2Q2_plan_action'];
        $C2Q3_interpretation = $_POST['C2Q3_interpretation'];
        $C2Q3_plan_action = $_POST['C2Q3_plan_action'];
        $C2Q4_interpretation = $_POST['C2Q4_interpretation'];
        $C2Q4_plan_action = $_POST['C2Q4_plan_action'];

        //C2
        if ($C2Q1_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C2Q1_plan_action ='$C2Q1_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C2Q1_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C2Q1_interpretation ='$C2Q1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C2Q2_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C2Q2_plan_action ='$C2Q2_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C2Q2_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C2Q2_interpretation ='$C2Q2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C2Q3_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C2Q3_plan_action ='$C2Q3_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C2Q3_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C2Q3_interpretation ='$C2Q3_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C2Q4_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C2Q4_plan_action ='$C2Q4_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C2Q4_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C2Q4_interpretation ='$C2Q4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        /* Recuperation des variables */
        $C3Q1_interpretation = $_POST['C3Q1_interpretation'];
        $C3Q1_plan_action = $_POST['C3Q1_plan_action'];
        $C3Q2_interpretation = $_POST['C3Q2_interpretation'];
        $C3Q2_plan_action = $_POST['C3Q2_plan_action'];
        $C3Q3_interpretation = $_POST['C3Q3_interpretation'];
        $C3Q3_plan_action = $_POST['C3Q3_plan_action'];
        $C3Q4_interpretation = $_POST['C3Q4_interpretation'];
        $C3Q4_plan_action = $_POST['C3Q4_plan_action'];

        //C3
        if ($C3Q1_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C3Q1_plan_action ='$C3Q1_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C3Q1_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C3Q1_interpretation ='$C3Q1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C3Q2_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C3Q2_plan_action ='$C3Q2_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C3Q2_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C3Q2_interpretation ='$C3Q2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C3Q3_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C3Q3_plan_action ='$C3Q3_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C3Q3_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C3Q3_interpretation ='$C3Q3_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C3Q4_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C3Q4_plan_action ='$C3Q4_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C3Q4_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C3Q4_interpretation ='$C3Q4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        /* Recuperation des variables */
        $C4Q1_interpretation = $_POST['C4Q1_interpretation'];
        $C4Q1_plan_action = $_POST['C4Q1_plan_action'];
        $C4Q2_interpretation = $_POST['C4Q2_interpretation'];
        $C4Q2_plan_action = $_POST['C4Q2_plan_action'];
        $C4Q3_interpretation = $_POST['C4Q3_interpretation'];
        $C4Q3_plan_action = $_POST['C4Q3_plan_action'];
        $C4Q4_interpretation = $_POST['C4Q4_interpretation'];
        $C4Q4_plan_action = $_POST['C4Q4_plan_action'];

        //C4
        if ($C4Q1_plan_action !=""){
            $requete2 = "UPDATE Diagnostics SET C4Q1_plan_action ='$C4Q1_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C4Q1_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C4Q1_interpretation ='$C4Q1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C4Q2_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C4Q2_plan_action ='$C4Q2_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C4Q2_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C4Q2_interpretation ='$C4Q2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C4Q3_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C4Q3_plan_action ='$C4Q3_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C4Q3_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C4Q3_interpretation ='$C4Q3_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C4Q4_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C4Q4_plan_action ='$C4Q4_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C4Q4_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C4Q4_interpretation ='$C4Q4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        /* Recuperation des variables */
        $C5Q1_interpretation = $_POST['C5Q1_interpretation'];
        $C5Q1_plan_action = $_POST['C5Q1_plan_action'];
        $C5Q2_interpretation = $_POST['C5Q2_interpretation'];
        $C5Q2_plan_action = $_POST['C5Q2_plan_action'];
        $C5Q3_interpretation = $_POST['C5Q3_interpretation'];
        $C5Q3_plan_action = $_POST['C5Q3_plan_action'];
        $C5Q4_interpretation = $_POST['C5Q4_interpretation'];
        $C5Q4_plan_action = $_POST['C5Q4_plan_action'];

        //C5
        if ($C5Q1_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C5Q1_plan_action ='$C5Q1_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C5Q1_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C5Q1_interpretation ='$C5Q1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C5Q2_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C5Q2_plan_action ='$C5Q2_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C5Q2_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C5Q2_interpretation ='$C5Q2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C5Q3_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C5Q3_plan_action ='$C5Q3_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C5Q3_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C5Q3_interpretation ='$C5Q3_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C5Q4_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C5Q4_plan_action ='$C5Q4_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C5Q4_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C5Q4_interpretation ='$C5Q4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        /* Recuperation des variables */
        $C6Q1_interpretation = $_POST['C6Q1_interpretation'];
        $C6Q1_plan_action = $_POST['C6Q1_plan_action'];
        $C6Q2_interpretation = $_POST['C6Q2_interpretation'];
        $C6Q2_plan_action = $_POST['C6Q2_plan_action'];
        $C6Q3_interpretation = $_POST['C6Q3_interpretation'];
        $C6Q3_plan_action = $_POST['C6Q3_plan_action'];
        $C6Q4_interpretation = $_POST['C6Q4_interpretation'];
        $C6Q4_plan_action = $_POST['C6Q4_plan_action'];

        //C6
        if ($C6Q1_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C6Q1_plan_action ='$C6Q1_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C6Q1_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C6Q1_interpretation ='$C6Q1_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C6Q2_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C6Q2_plan_action ='$C6Q2_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C6Q2_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C6Q2_interpretation ='$C6Q2_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C6Q3_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C6Q3_plan_action ='$C6Q3_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C6Q3_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C6Q3_interpretation ='$C6Q3_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        if ($C6Q4_plan_action != ""){
            $requete2 = "UPDATE Diagnostics SET C6Q4_plan_action ='$C6Q4_plan_action' WHERE Id_critere_bis = '$Id_Critere' ";
            $result2 = mysqli_query($db, $requete2);
        }
        if ($C6Q4_interpretation != ""){
            $requete3 = "UPDATE Diagnostics SET C6Q4_interpretation ='$C6Q4_interpretation' WHERE Id_critere_bis = '$Id_Critere' ";
            $result3 = mysqli_query($db, $requete3);
        }

        header('Location: https://dev2.icam.fr/toulouse/GEI/Confiance/Controleur/Traitement.php');
        ?>
    </body>
</html>
