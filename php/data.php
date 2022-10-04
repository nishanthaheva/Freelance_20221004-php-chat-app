<?php 
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messaging WHERE (in_id = {$row['unique_id']} 
                    OR out_id = {$row['unique_id']}) AND (out_id  = {$outgoing_id} 
                    OR in_id  = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];

        }else{
            $result = "No incoming message";
        }

        (strlen($result)> 28) ? $msg = substr($result, 0, 26) : $msg = $result;
        //check is user online or offline
        ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";
        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="info">
                    <div class="detail">
                        <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                        <p>'.$msg.'</p>
                    </div>
                    </div>
                    <div class="status-on '. $offline .' "><i class="fas fa-circle"></i></div>
                    </a>';
        }
?>