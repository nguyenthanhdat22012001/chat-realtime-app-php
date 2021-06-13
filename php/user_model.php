<?php
include_once "database.php";
function insertUser($ran_id,$fname,$lname,$email,$encrypt_pass,$new_img_name,$status){
    $sql="INSERT INTO users (unique_id, fname, lname, email, password, img, status)
    VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')";
    return execute($sql);
}
function updateStatusUser($unique_id,$status){
    $sql= "UPDATE users SET status = '$status' WHERE unique_id = $unique_id ";
    return execute($sql);
}
function countRowUser($email){
    $sql="SELECT COUNT(*) FROM users WHERE email = '{$email}'";
    return countRow($sql);
}
function getUserEmail($email){
    $sql="SELECT * FROM users WHERE email = '{$email}'";
    return query_one($sql);
}
function getUserUnique_id($unique_id){
    $sql="SELECT * FROM users WHERE unique_id = {$unique_id}";
    return query_one($sql);
}
function getUserOutgoing($outgoing_id){
    $sql="SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    return query($sql);
}
function getMessage($getOutgoingUser,$outgoing_id){
    $sql="SELECT * FROM messages WHERE (incoming_msg_id = {$getOutgoingUser['unique_id']}
    OR outgoing_msg_id = {$getOutgoingUser['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    return query_one($sql);
}

function seachUser($searchTerm,$outgoing_id){
    $sql="SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    return query($sql);
}
//455031361 673022097
?>