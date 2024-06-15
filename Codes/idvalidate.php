<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location:home.html");
    exit();
}
$conn=mysqli_connect("localhost","root","","atmdb");

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['special-id']))
{
    $special_id=$_POST['special-id'];
    $acc_num=$_POST['acc_num'];
    $userid=$_SESSION['user_id'];
    $sql=" SELECT id FROM logintb WHERE id='$special_id' AND acc_number=$acc_num  ";
    $result=$conn->query($sql);
    if($result->num_rows>0 && $special_id==$userid){
        include("updatepinform.html");
    }
    else{
        include("cantretrieve.html");

    }


}


?>