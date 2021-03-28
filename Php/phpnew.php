<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect("localhost", "root","","railway_information");

// get the post records
$psgName = $_POST['psgName'];
$psgid= $_POST['psgid'];
$psgAge = $_POST['psgAge'];
$psgGender = $_POST['psgGender'];

// database insert SQL code
$sql = "INSERT INTO passenger_details(`P_NAME`,`PASS_ID`, `P_AGE`, `P_GENDER`) 
		VALUES ('$psgName','$psgid', '$psgAge', '$psgGender')";
// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
header('Location: existing.html'); 
}
?>