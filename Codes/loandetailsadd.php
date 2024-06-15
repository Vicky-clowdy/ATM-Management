<?php

session_start();
$userid=$_SESSION['user_id'];
$username=$_SESSION['loan_username'];
$age=$_SESSION['loan_userage'];
$mobile=$_SESSION['loan_usermobile'];
$pan=$_SESSION['loan_userpan'];
$loan_amt=$_SESSION['loan_amt'];
$loanemi=$_SESSION['monthly_pay'];
$totalamt=$_SESSION['total'];
$status="pending";
$status2="completed";

$birthdate=date('Y-m-d',strtotime("-$age years"));


$conn=mysqli_connect("localhost","root","","atmdb");
if(isset($_POST['proceed']))
{
    $sql=" INSERT INTO `loan` (`id`, `user_name`, `mobile_number`, `DOB`, `pan_number`, `loan_amt`, `loan_emi`, `total_amt`, `status`) VALUES ('$userid', '$username', '$mobile', '$birthdate','$pan', '$loan_amt', '$loanemi', '$totalamt', '$status')  ";
    if($conn->query($sql)===TRUE){
        include("loanreqsuccess.html");
    }
    else{
        include("cantretrieve.html");
    }
}




?>