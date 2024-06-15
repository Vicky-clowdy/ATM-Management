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
if($result->num_rows>0)
{
$row=$result->fetch_assoc();
$current_amount=$row['amount'];
}
else{
    echo "unable to retieve";
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $deposit_input=$_POST['deposit-input'];

    if($deposit_input>0 && ($deposit_input % 100==0 || $deposit_input % 200==0 || $deposit_input % 500==0) ){
        $sql=" UPDATE amounttb SET amount = amount + $deposit_input WHERE id='$userid' "; 
        if($conn->query($sql)===TRUE){
            $sql_insert=" INSERT INTO transaction_history (user_id,transaction_type,amount)VALUES ('$userid','deposit','$deposit_input')";
            if($conn->query($sql_insert)===TRUE){
                include("depositsuccess.html");
            }
            else{
            include("depositfails.html");
          }

    }else{
        include("invalidamt.html");
    }
}
else{
    include("invalidamt.html");
}
}
?>
