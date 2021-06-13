<?php 
ob_start();
    session_start();
    include_once "user_model.php";
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    if(!empty($email) && !empty($password)){
        $user = getUserEmail($email);
        if(!empty($user)){
            $user_pass = md5($password);
            $enc_pass = $user['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $updateStatus = updateStatusUser( $user['unique_id'],$status);
                if($updateStatus){
                    $_SESSION['unique_id'] = $user['unique_id'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>