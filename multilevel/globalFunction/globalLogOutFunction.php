<?php
    
    include "globalSessionStart.php";

    if(isset($_SESSION['log'], $_SESSION['email'], $_SESSION['role'])){
       
        session_destroy();
        header('location:../');

    }
    
?>