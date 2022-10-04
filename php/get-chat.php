<?php 
     session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        

        $sql = "select * FROM messaging 
                LEFT JOIN users ON users.unique_id = in_id
                WHERE (in_id = {$incoming_id} AND out_id = {$outgoing_id})
                OR (out_id = {$incoming_id} AND in_id = {$outgoing_id}) ORDER BY msg_id DESC";
echo  $sql ;
        $audio_player="<audio controls = 'controls' autoplay";

        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['out_id'] === $outgoing_id){ //msg sender if out_id is same with outgoing_id
                    $output .= '<div class="outgoing-chat">
                                <div class="chat-bub">
                                    <p>'. $row['msg'] .'</p>
                                    <form action="text-speach.php" class= text-voice name = txt>
                                    <button><i class="fas fa-microphone" style="font-size:24px"></i></button> 
                                    </form>
                                </div>
                                </div>';
                }else{ //msg receiver
                    $output .= '<div class="incoming-chat">
                                <div class="chat-bub">
                                    <p>'. $row['msg'] .'</p>
                                    <button><i class="fas fa-microphone" style="font-size:24px"></i></button>
                                </div>
                                </div>';
                }
            }
            echo $output;
        }
    }else{
        header("../login.php");
    
    }
?>