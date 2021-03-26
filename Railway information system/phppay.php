<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect("localhost", "root","","railway_information");

// get the post records
$psgid= $_POST['psgid'];
$psgctype = $_POST['psgctype'];
$psgbname = $_POST['psgbname'];
$psgcno = $_POST['psgcno'];
$psgcname = $_POST['psgcname'];

$sql = "INSERT INTO card_details(`PASS_ID`, `CARD_TYPE`, `BANK_NAME`, `CARD_NUMBER`,`CARD_NAME`) 
		 VALUES ('$psgid', '$psgctype', '$psgbname','$psgcno','$psgcname')";

    $rs = mysqli_query($con, $sql);

    if($rs)
    {
    echo " Payment done"; 
    }
    ?>
    
