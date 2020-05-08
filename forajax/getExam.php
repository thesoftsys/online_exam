<?php 

include('../includes/connection.php');

$courseName = $_GET['courseName'];

$query = mysqli_query($db,"SELECT * FROM add_new_exam WHERE cname = '$courseName'");


while($row = mysqli_fetch_array($query))
{
    echo "<option>"; echo $row['ename']; echo "</option>";
}





?>