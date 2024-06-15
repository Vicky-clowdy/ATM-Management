<?php

session_start();

$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];


$name=$_POST['remaining-loan-user'];
$pan=$_POST['remaining-loan-user-pan'];



$sql_balance=" SELECT total_amt FROM loan WHERE pan_number='$pan' AND user_name='$name' ";
$result=$conn->query($sql_balance);
if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $current_balance=$row['total_amt'];
    if($current_balance<=0){
    include("loancompleted.html");
    }
    else{
        include("remainingloandesign.html");
    }
}
else{
    include("cantretrieve.html");
    
}
