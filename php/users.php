<?php
ob_start();
    session_start();
    include_once "user_model.php";
    $outgoing_id = $_SESSION['unique_id'];
    $getOutgoingUser = getUserOutgoing($outgoing_id);
    $countOutgoingUser = getUserOutgoing($outgoing_id)->fetchColumn();
    $output = "";
    if($countOutgoingUser < 0){
        $output .= "No users are available to chat";
    }else{
       include_once "data.php";
    }
    echo $output;
?>