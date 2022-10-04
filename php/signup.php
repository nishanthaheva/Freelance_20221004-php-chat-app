<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //check if email is valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if valid email
        
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email= '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //for exist emails
                echo "$email - email already exist!";
            }else{

                        $status = "Active"; //when a user is signed up or loged into their account thier status will show that their active or online currently 

                             $random_id = rand(time(), 10000000); //to create random user's id

                            //hash password during signup
                            $hased_pass = password_hash($password, PASSWORD_DEFAULT);

                            //inserting all the data into mysql table 
                            $sqlQry="insert into users(unique_id, fname, lname, email, password, status,img) values({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$hased_pass}', '{$status}','');";

                            echo $sqlQry;


                            $sql2 = mysqli_query($conn,  $sqlQry );
                           // if($sql2){
                                $sql3 = mysqli_query($conn, "select * from users where email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //with these we are using the unique id in other php files too. 
                                    echo "success";
                                }
                          //  }else{
                           //     echo "Something went wrong!!! ";
                          //  }
            }
        }else{
            echo "$email - this email is not valid!";
        }
    }else{
        echo "All input are required!";
    }

?>