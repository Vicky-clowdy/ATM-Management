<?php

session_start();

$birthdate=$_POST['loan-req-age'];
$salary=$_POST['salary-loan'];
$pan=$_POST['pan-loan'];

$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];

$age=date_diff(date_create($birthdate),date_create('today'))->y;
$sql_pan="SELECT * FROM loan WHERE pan_number='$pan' ";
$result_pan=$conn->query($sql_pan);


            

$name=$_POST['user-name-req'];
$mobile=$_POST['user-mobile-num'];
$_SESSION['loan_username']=$name;
$_SESSION['loan_usermobile']=$mobile;
$_SESSION['loan_userage']=$age;
$_SESSION['loan_usersalary']=$salary;
$_SESSION['loan_userpan']=$pan;

 

if(isset($_POST['submit'])){
    if($result_pan->num_rows > 0){
        echo "pan exists";
    }
    else{
    if($age>=18 && $age<=50 && $salary>15000){
        

        $sql=" SELECT COUNT(*) AS transaction_count FROM transaction_history WHERE user_id='$userid' ";
        $result=$conn->query($sql);
if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        $transaction_count = $row['transaction_count'];
        if($transaction_count >= 10){
            
        include("loancalulation.html");
        }
        elseif($transaction_count <10 && $transaction_count >=5 ){
            include("loancalulation2.html");


        }
        elseif($transaction_count <5 && $transaction_count >=3 ){
            include("loancalulation3.html");
        }
        
        else{
        include("lesstransaction.html");
        }
    }

}else{
    include("cantretrieve.html");
}

    }

else{
    include("agelow.html");
}
}

}


?>