<?php
    session_start();
    $_SESSION['loggedin']=false;
    header('Location: /comp3421_group/index.php');
?>