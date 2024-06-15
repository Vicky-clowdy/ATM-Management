<?php

session_start();

$conn=mysqli_connect("localhost","root","","atmdb");
if(isset($_POST['user_name']) && isset($_POST['user_pin'])){
  $username=$_POST['user_name'];
  $userpin=$_POST['user_pin'];
  $acc_num=$_POST['user_acc'];


$sql="SELECT id from logintb where name='$username' AND pin=$userpin AND acc_number=$acc_num ";
$r=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($r);
if($resultcheck>0){
  $row=$r->fetch_assoc();
  $userid=$row['id'];
  $_SESSION['user_id']=$userid;
  include("operationscreen.html");
}
else{
  include("home.html");
}
}
?>