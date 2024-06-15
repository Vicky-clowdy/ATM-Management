<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: home.html");
    exit();
  }

$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];

$sql_balance=" SELECT amount FROM amounttb WHERE id='$userid' ";
$result=$conn->query($sql_balance);
if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $current_balance=$row['amount'];
    include("checkbalancedesign.html");
}
else{
    include("cantretrieve.html");
    
}