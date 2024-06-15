<?php

session_start();


if(!isset($_SESSION['user_id']))
{
    header("Location: home.html");
    exit();
}
$conn=mysqli_connect("localhost","root","","atmdb");

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['update-pin']))
{
    
    $update_pin=$_POST['update-pin'];
    $userid=$_SESSION['user_id'];

    $sql_check_pin=" SELECT pin FROM logintb WHERE id='$userid' ";
    $result_check_pin=$conn->query($sql_check_pin);
    if($result_check_pin->num_rows>0){
        $row_pin=$result_check_pin->fetch_assoc();
        $existing_pin=$row_pin['pin'];
        if($update_pin==$existing_pin)
        {
           include("existingpin.html");
        }
    }



    $sql=" UPDATE logintb SET pin='$update_pin' WHERE id='$userid'  ";
    if($conn->query($sql)===TRUE){
        include("pinchangesucess.html");
    }
    else{
        $pin_error="Error";
        echo $pin_error;
    }


}
?>