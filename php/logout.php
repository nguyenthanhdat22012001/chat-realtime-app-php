<?php
ob_start();
    session_start();
    include_once "user_model.php";
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = $_GET['logout_id'];
        if(isset($logout_id)){
            $status = "Offline now";
            $updateStatus = updateStatusUser($logout_id,$status);
            if($updateStatus){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>