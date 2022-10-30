<?php

    //Jangan Merubah Urutan Order
    include "globalSessionStart.php";
    include "globalDbConnection.php";
     //Jangan Merubah Urutan Order

    $pecahUri   = explode("/", $_SERVER['REQUEST_URI']);
    $lokasi     = $pecahUri[2];
    $jumlahUri  = count($pecahUri);
    $urlKembali = ($jumlahUri > 3) ? "../" : null;

    if(!isset($_SESSION['log'], $_SESSION['role'], $_SESSION['email'])){

        if($lokasi === 'admin' || $lokasi === 'user'){

            return header('location:../');

        }

    }else{

        $statusLog = $_SESSION['log'];
        $role      = $_SESSION['role'];
        $email     = $_SESSION['email'];
        
        if($role === 'admin'){

            if($lokasi !== 'admin' && $lokasi !== 'template'){

                return header('location:'.$urlKembali.'admin/');

            }

        }elseif($role === 'user'){
        
            
            if($lokasi !== 'user' && $lokasi !== 'template'){
                
                return header('location:'.$urlKembali.'user/');
                
            }

        }else{

            session_destroy();
            return header("location:../");

        }

    }

?>