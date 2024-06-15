<?php

session_start();
$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];
$loan_amt=$_SESSION['loan_amt'];
$loanemi=$_SESSION['monthly_pay'];
$totalamt=$_SESSION['total'];
$status="pending";
$status2="completed";

$name=$_POST['pay-loan-user'];
$pan=$_POST['pay-loan-user-pan'];






$sql=" SELECT amount FROM amounttb WHERE id='$userid' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$acc_balance=$row['amount'];
$sqlemi = " SELECT loan_emi , total_amt FROM loan WHERE pan_number='$pan'  AND user_name='$name' ";
$result1=mysqli_query($conn,$sqlemi);
if($result1->num_rows>0){
    $row1=mysqli_fetch_assoc($result1);
    $loan_emi_pay=$row1['loan_emi'];
    $total_amt_pay=$row1['total_amt'];
    
if($total_amt_pay > 0){

 if($acc_balance >= $loan_emi_pay){
    $new_balance=$acc_balance - $loan_emi_pay;
    $new_total_amt_pay = $total_amt_pay - $loan_emi_pay;


    $update=" UPDATE amounttb SET amount='$new_balance' WHERE id='$userid' ";
    mysqli_query($conn,$update);
    $update2=" UPDATE loan SET total_amt='$new_total_amt_pay' WHERE pan_number='$pan' AND user_name='$name' ";
    mysqli_query($conn,$update2);
    include("loanpaid.html");
}
else{
    include("insuffientmoney.html");
}
}
else{
    $update3=" UPDATE loan SET status='completed' WHERE pan_number='$pan' AND user_name='$name' ";
    mysqli_query($conn,$update3);
    include("allloanpaid.html");

}
}else{
    echo "user cant find";
}


?>