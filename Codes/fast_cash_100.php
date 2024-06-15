<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: home.html");
    exit();
  }

$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];

if(isset($_POST['fast-amt'])){
    $amt=$_POST['fast-amt'];
    $checkbal=" SELECT amount FROM amounttb WHERE id='$userid' ";
    $balanceresult=$conn->query($checkbal);
    if($balanceresult->num_rows > 0){
        $row=$balanceresult->fetch_assoc();
        $balance=$row['amount'];
        if($amt > $balance){
            include("insuffientmoney.html");
        }
        else{

    $updatesql=" UPDATE amounttb SET amount = amount - $amt WHERE id='$userid' ";
    if($conn->query($updatesql)===TRUE){
        include("fastcash_success.html");
    }
    else{
        include("cantretrieve.html");
    }
}
    }
    else{
        include("cantretrieve.html");
    }
}else{
    include("cantretrieve.html");
}
?>