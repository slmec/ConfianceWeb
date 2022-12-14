<?php
session_start();
$db_username = 'eleve.tou';
$db_password = 'et*301';
$db_name     = 'Confiance';
$db_host     = 'localhost';

$_SESSION['db_username'] = $db_username;
$_SESSION['db_password'] = $db_password;
$_SESSION['db_name'] = $db_name;
$_SESSION['db_host'] = $db_host;

?>
