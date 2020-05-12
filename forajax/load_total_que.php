<?php 
    session_start();
    include('../includes/connection.php');
    $total_que = 0;

    $selQue = mysqli_query($db,"SELECT *FROM add_questions WHERE exam_id ='$_SESSION[exam_id]'");
    $total_que = mysqli_num_rows($selQue);
    echo $total_que;



?>