<?php
session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT * FROM users WHERE email = '$email' limit 1";
    
    if(!empty($email) && !empty($password)){
        //check user details 
        $sql = mysqli_query($conn, $query);

            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                // echo $row['password'];
                if(password_verify($password, $row['password'] )){
                    $status = "Active";
                    //update user status when login
                    $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                    if($sql2){
                        $_SESSION['unique_id'] = $row['unique_id']; //with these we are using the unique id in other php files too. 
                    echo "success";
                    }
                }
            }else{
                echo "Email or password is incorrect!";
                }

    }else{
        echo "All input must be filled!";
    }
?>