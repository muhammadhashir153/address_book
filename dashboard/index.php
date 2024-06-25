<?php
    if(session_status() == PHP_SESSION_NONE){
        
        session_start();
        if(isset($_SESSION['u_id'])){
            include_once(__DIR__ . "/main.php");
        }else{
            header("location: ../index.php");
        }
    }
?>