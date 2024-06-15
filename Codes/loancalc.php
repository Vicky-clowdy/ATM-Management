<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM BANKING</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="outer-box">
        <div id="inside-camera"></div>
        <div id="camera"></div>
        <div id="indicator"></div>
        <div id="inner-box">

        <div id="loan-calc-result">



        
<?php

session_start();

$name=$_SESSION['loan_username'];
$mobile=$_SESSION['loan_usermobile'];
$age=$_SESSION['loan_userage'];
$salary=$_SESSION['loan_usersalary'];
$pan=$_SESSION['loan_userpan'];

$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];

$loan_amt=$_POST['loan-amt'];
$interesr_rate=$_POST['i-rate'];
$months=$_POST['loan-month'];

$_SESSION['loan_amt']=$loan_amt;
$_SESSION['i_rate']=$interesr_rate;
$_SESSION['loan_months']=$months;

if(isset($_POST['submit'])){
    if($loan_amt <=0 || $interesr_rate <=0 || $months<=0){
        include("invalidamt.html");
    
    }
    elseif($loan_amt<50000 || $loan_amt > 1500000){
        include("maxmin.html");
    }
    else{
        $interesr_rate=$interesr_rate/100/12;
        $monthlypay = ($loan_amt * $interesr_rate) / (1-pow(1+$interesr_rate , -$months));
        $total = $monthlypay * $months;
        $monthlypay = number_format($monthlypay,2,'.','');
        $total = number_format($total , 2,'.','');
        echo " <p> monthly EMI Amount is : $monthlypay </p>"."<br>";
        echo " <p> total  amount is : $total </p>" .  "<br>";

       echo "<button onclick='proceedpage()'>PROCEED</button>";
       echo "<button onclick='cancelpage()'  >CANCEL</button>";
        
        $_SESSION['monthly_pay']=$monthlypay;
        $_SESSION['total']=$total;
    }

}




?>



        </div>
            




        </div>
        <div id="outer-box2">

            <div id="cash"></div>
            <p id="collectcash">Collect your cash here</p>

            <div id="credit">
                <div id="inner-cred">
                    <div id="credit-card"></div>
                </div>
            </div>
        </div>
    </div>

<script>

    function cancelpage(){
        window.location.href="operationscreen.html";
    }

    function proceedpage(){
        window.location.href="loanprint.php";
    }



</script>
     

</body>

</html>


