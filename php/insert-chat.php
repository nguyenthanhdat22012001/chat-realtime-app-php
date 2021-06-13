<?php 
ob_start();
    session_start();
    include_once "model_chat.php";
    if(isset($_SESSION['unique_id'])){
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        if(!empty($message)){
            insertMessage($outgoing_id,$incoming_id,$message);
        }
    }else{
        header("location: ../login.php");
    }


    
?>