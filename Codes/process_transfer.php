<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: home.html");
    exit();
  }

$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];


$name=$_POST['recipient'];
$amount=$_POST['amount'];
$acc_num=$_POST['rec_acc_num'];

$checkbalance=" SELECT amount FROM amounttb WHERE id='$userid' ";
$result=$conn->query($checkbalance);

$userfind=" SELECT id FROM logintb WHERE id='$name' AND acc_number=$acc_num ";
$result1=$conn->query($userfind);


if($name == $userid){
    include("cantsend.html");
    
}

elseif ($result1->num_rows>0){

if($result->num_rows == 1){
    $row=$result->fetch_assoc();
    $senderbalance = $row['amount'];

if($amount>=100 && $amount<=50000 && ($amount %100 == 0 || $amount %200 == 0 || $amount %500 == 0)){

    if($senderbalance >= $amount)
    {


$updatesender=" UPDATE amounttb SET amount= amount - $amount WHERE id='$userid' ";
$updatereceiver=" UPDATE amounttb SET amount= amount + $amount WHERE id='$name' ";

if($conn->query($updatesender)===TRUE && $conn->query($updatereceiver)===TRUE){
    include("fund_success.html");
}
else{
    include("fund_fails.html");
}
}else{
    include("insuffientmoney.html");
}
}
else{
    include("invalidamt.html");
}
}
}
else{
    include("cantretrieve.html");
}


?>