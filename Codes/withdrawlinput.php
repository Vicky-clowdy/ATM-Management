<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: home.html");
    exit();
  }

$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];
$sql_select=" SELECT amount FROM amounttb WHERE id='$userid' ";
$result=$conn->query($sql_select);
if($result->num_rows>0){
$row=$result->fetch_assoc();
$current_amount=$row['amount'];
}
else{
    echo "unable to retieve";
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $withdrawl_input=$_POST['withdrawl-input'];
  if($withdrawl_input<=0){
    include("invalidamt.html");
  }
  elseif($withdrawl_input>0 && $withdrawl_input<=$current_amount){
    $sql=" UPDATE amounttb SET amount = amount - $withdrawl_input WHERE id='$userid' ";
    if($conn->query($sql)===TRUE){
      $sql_insert=" INSERT INTO transaction_history(user_id,transaction_type,amount) VALUES ('$userid','withdrawl','$withdrawl_input') ";
      if($conn->query($sql_insert)===TRUE){
        include("withdrawlsuccess.html");
      }
      else{
        include("withdrawlfails.html");
      }
    }
    else{
      include("withdrawlfails.html");
    }
  }else{
    include("insuffientmoney.html");
  }
}
?>
