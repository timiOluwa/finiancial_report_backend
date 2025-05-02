<?php

include('./include/connect.php');

if(isset($_POST['submit'])){
    $expensesDescription = mysqli_real_escape_string($conn, $_POST['expensesDescription']);
    $amount = mysqli_real_escape_string($conn, $_POST['amountOfEXpenses']);

    $sql = "INSERT INTO expenses (expensesDescription, amount) VALUES ('$expensesDescription', '$amount')";

    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:expenses.php?message=record updated successfully');
    }else{
        echo "Wrong parameters". mysqli_error($conn);
    }
}

?>