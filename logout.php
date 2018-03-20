<?php 
    //remove $_SESSION
    
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
        exit();
    }
    unset($_SESSION['id']);
    unset($_SESSIONfav['favorites']);
    header("Location: index.php");
    
?>
