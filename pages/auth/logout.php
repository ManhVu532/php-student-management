<?php
    session_start();
    session_unset();
    session_destroy();
    unset($_COOKIE['user']); 
    setcookie('user', null, -1); 
    header('Location: login.php');
