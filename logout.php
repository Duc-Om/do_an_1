<?php

    session_start();
    unset($_SESSION['account']);
    unset($_SESSION['password']);
    if(isset($_COOKIE['account']) && isset($_COOKIE['password'])){

        setcookie('account',null,time()-86400);
        setcookie('password',null,time()-86400);
        header('Location: ./login.php');
    }
    session_destroy();
?>