

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

        <div id="loan-calc-print">
            <div id="loan-calc-print-flex">
                <form action="loandetailsadd.php" method="post" >
                    <label for="print-name">Username : </label>
                    <input type="text" readonly id="print-name" value=" <?php session_start(); echo $_SESSION['loan_username']; ?>"><br>

                    <label for="print-id">User ID : </label>
                    <input type="text" readonly id="print-id" value=" <?php echo $_SESSION['user_id']; ?>"><br>



                    <label for="print-age">User Age : </label>
                    <input type="text" id="print-age" readonly value=" <?php echo $_SESSION['loan_userage']; ?>"> <br>

                    <label for="print-phone">User Mobile Number : </label>
                    <input type="text" id="print-phone" readonly value=" <?php echo $_SESSION['loan_usermobile']; ?>"> <br>


                    <label for="print-pan">User PAN : </label>
                    <input type="text" id="print-pan" readonly value=" <?php echo $_SESSION['loan_userpan']; ?>"> <br>

                    <label for="print-loanamt">Loan Amount : </label>
                    <input type="text" id="print-loanamt" readonly value=" <?php echo $_SESSION['loan_amt']; ?>"> <br>

                    <label for="print-loan-ir">Interest Rate : </label>
                    <input type="text" id="print-loan-ir" readonly value=" <?php echo $_SESSION['i_rate']; ?>"> <br>

                    <label for="print-loan-term">Loan Term ( in Months ) :</label>
                    <input type="text" id="print-loan-term" readonly value=" <?php echo $_SESSION['loan_months']; ?>"> <br>

                    
                    <label for="print-loan-emi">Loan EMI ( Per Month ) :</label>
                    <input type="text" id="print-loan-emi" readonly value=" <?php echo $_SESSION['monthly_pay']; ?>"> <br>

                    <label for="print-loan-total">Total Amount :</label>
                    <input type="text" id="print-loan-total" readonly value=" <?php echo $_SESSION['total']; ?>"> <br>




                    <button type="submit" name="proceed">PROCEED</button>
                    <button type="button" onclick="goback()">CANCEL</button>



                    


                    





                </form>
        
        
        
        </div>



        
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

    function goback(){
        window.history.back();
    }


</script>
     
</body>

</html>

