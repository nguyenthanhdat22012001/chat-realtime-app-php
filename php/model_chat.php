<?php
include_once "database.php";
function getMessage($outgoing_id,$incoming_id){
    $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
    WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
    OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    return query($sql);
}
function insertMessage($outgoing_id,$incoming_id,$message){
    $sql="INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
    VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
    return execute($sql);
}
?>