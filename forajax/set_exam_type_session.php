<?php
    session_start();
    include('../includes/connection.php');
    $exam_id = $_GET['exam_id'];
    $_SESSION['exam_id'] = $exam_id;
    $res = mysqli_query($db,"SELECT *FROM add_new_exam WHERE id = '$exam_id'");
    while($row = mysqli_fetch_array($res))
    {
        $_SESSION['exam_time'] = $row['exam_time'];
    }
    $date = date("Y-m-d H:i:s");

    $_SESSION['end_time'] = date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
    $_SESSION['exam_start'] = "yes";


?>