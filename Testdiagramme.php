<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

        <title></title>
</head>
<body>
<?php
$mdp = "coucou";
$mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
$mdp2 = "coucou1";
echo $mdp_hash;
if (password_verify($mdp2, $mdp_hash))
{
    echo "Mot de passe correct";
}
else
{
    echo "Mot de passe incorrect";
}
?>
</body>
</html>