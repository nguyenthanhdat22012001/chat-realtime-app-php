<?php
    ob_start();
    session_start();
    include_once "user_model.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm =  $_POST['searchTerm'];

    $seachResult = seachUser($searchTerm,$outgoing_id)->fetchColumn();
    $getOutgoingUser =seachUser($searchTerm,$outgoing_id);
    if($seachResult > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>