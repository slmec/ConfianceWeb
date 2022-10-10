<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>


</head>
<body>
    <?php
    include('HautDePage.php')
	?>

    <h1>Devenez membre de MAIAT</h1>

    <p>&nbsp;</p>


    <h3>Formulaire d&#39;inscription :</h3>

    <form action="inscription2.php" method="post" name="profil" target="_self">
      <p>Nom :&nbsp;<input maxlength="250" name="nom_utilisateur" type="text" /></p>

      <p>Prenom :&nbsp;<input maxlength="250" name="prenom_utilisateur" type="text" /></p>

      <p>Email :&nbsp;<input name="email_utilisateur" type="text" /></p>
      
      <p>Mot de passe :&nbsp;<input name="mdp_utilisateur" type="password" /></p>

      <p>Mon rôle dans l'intégration du système à base d'IA :&nbsp;<input name="role_utilisateur" type="text" /></p>

      <p>Mon organisme :&nbsp;<input name="organisme_utilisateur" type="text" /></p>

      <p><input type="checkbox" name="donnees_utilisateur" value="1" />&nbsp;J&#39;accepte le traitement et l&#39;utilisation de mes donn&eacute;es</p>
    
      <p><input name="s'inscrire" type="submit" value="S'inscrire" /></p>
    </form>

    <p>&nbsp;</p>

    <?php
    include('BasDePage.php')
	  ?>

</body>
</html>