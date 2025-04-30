<?php
include('./include/connect.php');

if(isset($_POST['submit'])){
    $incomeDescription = mysqli_real_escape_string($conn, $_POST['incomeDescription']);
    $Others = mysqli_real_escape_string($conn, $_POST['description']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);


    $sql = "INSERT INTO printingservices (incomeDescription, Others, amount) VALUES ('$incomeDescription', '$Others', '$amount')";

    if(mysqli_query($conn, $sql,)){
        echo "Connected Successfully";
        header('location:basicict.php');
    } else{
        echo "you don do mistake". mysqli_error($conn);
    }
}
?>