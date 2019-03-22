<?php
    session_start();

    if ( !isset($_SESSION["user_portal"])){
        header("location:login.php");
    }

?>