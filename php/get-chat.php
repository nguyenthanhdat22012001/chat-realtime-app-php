<?php 
ob_start();
    session_start();
    include_once "model_chat.php";
    if(isset($_SESSION['unique_id'])){
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_POST['incoming_id'];
        $output = "";
       $row = getMessage($outgoing_id,$incoming_id);
       $countMess = getMessage($outgoing_id,$incoming_id)->fetchColumn();
        if($countMess > 0){
            foreach ($row as $item) {
                if($item['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $item['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$item['img'].'" alt="">
                                <div class="details">
                                    <p>'. $item['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
           // $output = json_encode($row);
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>