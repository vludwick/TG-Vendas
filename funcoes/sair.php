<?php
    session_start();
    unset($_SESSION["user_portal"]);
    header("location:../crv vendas/login.php");

?>