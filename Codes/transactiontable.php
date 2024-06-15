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

        <button id="back" onclick="goback()" style="display: block;">Go Back</button>

            <div id="transaction-history-table">
                <?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: home.html");
    exit();
}
$conn=mysqli_connect("localhost","root","","atmdb");
$userid=$_SESSION['user_id'];

$sql=" SELECT * , ROW_NUMBER() OVER(PARTITION BY user_id ORDER BY transaction_date DESC) as row_num FROM transaction_history WHERE user_id='$userid'  ";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<h2>Transaction history</h2>";
    echo " <table>  ";
    echo " <tr><th>S.NO</th>
    <th>Transaction Type </th>
    <th>Amount</th>
    <th>Date</th></tr>  ";
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["row_num"]."</td>";
        echo "<td>".$row["transaction_type"]."</td>";
        echo "<td>".$row["amount"]."</td>";
        echo "<td>".$row["transaction_date"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "No transaction";
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
        function goback() {
            window.location.href="operationscreen.html";
            
        }


</script>
    

</body>

</html>