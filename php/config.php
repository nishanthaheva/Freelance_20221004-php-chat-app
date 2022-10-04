<?php
    $conn = mysqli_connect("localhost", "root", "root", "chatapp");
    if(!$conn){
        echo "Database connected" . mysql_connect_error();
    }
?>