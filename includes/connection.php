<?php 

$dbHost ="localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="online_exam";

$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
if($db->connect_error){
	die("connection Field: " . $db->connect_error);
}
 

?>