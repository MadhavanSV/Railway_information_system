<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect("localhost", "root","","railway_information");

// get the post records
$psgid= $_POST['psgid'];
$psgDate = $_POST['psgDate'];
$psgTNo = $_POST['psgTNo'];
$psgFromSt = $_POST['psgFromSt'];
$psgToSt = $_POST['psgToSt'];
$payment = $_POST['payment'];

// database insert SQL code

if($_POST['payment'] =="YES")
{
    $sql4 = "SELECT @seat_no:= MAX(SEAT_NO) +1 FROM travel_history where date = '$psgDate'";
    $rs= mysqli_query($con,$sql4);
    $sql5 = "SET @seat_no =(SELECT IFNULL(@seat_no,1))";
    $rs= mysqli_query($con,$sql5);
    $sql = "INSERT INTO travel_history(`PASS_ID`, `DATE`, `T_NO`, `FROM_ST`,`TO_ST`,`SEAT_NO`) 
		VALUES ('$psgid', '$psgDate', '$psgTNo','$psgFromSt','$psgToSt',@seat_no)";

    $rs = mysqli_query($con, $sql);
    
    $sql3 = "SET @amount=(SELECT ticket_price.price FROM travel_history\n"

    . "             INNER JOIN ticket_price ON travel_history.FROM_ST =ticket_price.ST_1 \n"

    . "             AND travel_history.TO_ST =ticket_price.ST_2\n"

    . "             WHERE travel_history.PASS_ID= '$psgid' AND travel_history.DATE= '$psgDate')";
    $rs = mysqli_query($con, $sql3);
        $sql4 = "INSERT INTO pay_details(`PASS_ID`, `DATE`, `AMOUNT`) 
        VALUES ('$psgid', '$psgDate',@amount)";
         $rs = mysqli_query($con, $sql4);
         
         header('Location: payment1.html');  

}


elseif($_POST['payment']== "NO")
{
    $sql1="START TRANSACTION";
    $rs1= mysqli_query($con, $sql1);
    $sql = "INSERT INTO travel_history(`PASS_ID`, `DATE`, `T_NO`, `FROM_ST`,`TO_ST`) 
		VALUES ('$psgid', '$psgDate', '$psgTNo','$psgFromSt','$psgToSt')";
// insert in database 
    $rs = mysqli_query($con, $sql);
    $sql2="ROLLBACK";
$rs2= mysqli_query($con, $sql2);
 echo "Payment failed";
}
?>