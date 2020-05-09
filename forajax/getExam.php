<?php 

include('../includes/connection.php');

$courseId = $_GET['courseId'];

$query = mysqli_query($db,"SELECT * FROM add_new_exam WHERE course_id = '$courseId'");


while($row = mysqli_fetch_array($query))
{
    echo "<option>"; echo $row['ename']; echo "</option>";
}





?>