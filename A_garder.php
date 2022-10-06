//Données récupérées du formulaire inscription.php
        $nom_utilisateur = $_POST['nom_utilisateur'];
        $prenom_utilisateur = $_POST['prenom_utilisateur'];
        $email_utilisateur = $_POST['email_utilisateur'];
        $mdp_utilisateur = $_POST['mdp_utilisateur'];
        $role_utilisateur = $_POST['role_utilisateur'];
        $organisme_utilisateur = $_POST['organisme_utilisateur'];
        $requete = "INSERT INTO Utilisateurs VALUES ('','$nom_utilisateur','$prenom_utilisateur','$email_utilisateur','$mdp_utilisateur','$role_utilisateur','$organisme_utilisateur')";
        $result = mysqli_query( $link, $requete )or die (mysqli_error($link)); //exécution de la requête
        //fermer la connexion à la BDD 

        //Données récupérées du formulaire identification.php
        $post_string_email_Utilisateur = (string) $_POST['email_Utilisateur'];
        $_SESSION['email_Utilisateur'] = $post_string_email_Utilisateur;
        
        $post_string_mdp_Utilisateur = (string) $_POST['mdp_Utilisateur'];
        $_SESSION['mdp_Utilisateur'] = $post_string_mdp_Utilisateur;
       
        $requete = "SELECT Nom,Prenom FROM Utilisateurs WHERE Email = '$_SESSION['email_Utilisateur']' AND MotDePasse = '$_SESSION['mdp_Utilisateur']'";
        echo $requete;
        //AND MotDePasse = $_SESSION['mdp_Utilisateur']";
       // $requete2 = "SELECT Prenom FROM Utilisateurs WHERE Email = '$_SESSION['email_Utilisateur']' AND MotDePasse = '$_SESSION['mdp_Utilisateur']'";
       // $result = mysqli_query($link, $requete1);
       // $InfosUtilisateur_Prenom = mysqli_query($link, $requete2);
        echo (string)$result;
       
        echo "Bienvenue" ;
        echo "Que souhaitez-vous faire ?";
    ?>