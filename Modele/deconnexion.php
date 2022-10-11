<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: https://dev2.icam.fr/toulouse/GEI/Confiance/index.php?");
?>
