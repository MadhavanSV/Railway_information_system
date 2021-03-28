<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect("localhost", "root","","railway_information");

// get the post records
$psgUser = $_POST['psgUser'];
// database insert SQL code
if( $_POST['psgUser']== "NEW")
    {
        header('Location: new.html'); 
    }
elseif($_POST['psgUser']== "EXISTING")
    {
        header('Location: existing.html');  
    }
?>