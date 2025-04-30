<?php

// include ('connect.php');

//     if (isset($_POST['submit'])){
//         $description = mysqli_real_escape_string($conn, $_POST["incomeDescription"]);
//         $amount = mysqli_real_escape_string($conn, $_POST ["amount"]);
//         $course = mysqli_real_escape_string($conn, $_POST["Course"]);
//         $price = mysqli_real_escape_string($conn,$_POST["price"]);
//         $noOfStudent = mysqli_real_escape_string($conn, $_POST["noOfStudent"]);
//         $expensesDescription = mysqli_real_escape_string($conn, $_POST["expensesDescription"]);
//         $amount3 = mysqli_real_escape_string($conn, $_POST["amount3"]);

//         $sql = "INSERT INTO printingServices (amount, incomeDescription) VALUES ('$amount', '$description')";
//         $sql2 = "INSERT INTO digitalskillacademy (course, noOfStudent,amount) VALUES ('$course','$noOfStudent','$price')";
//         $sql3 = " INSERT INTO expenses (expensesDescription, amount) VALUES ('$expensesDescription', '$amount3')";

//         if(mysqli_query($conn, $sql,) && mysqli_query($conn, $sql2) && mysqli_query($conn,$sql3)){
//             echo "connection successful bro";
//         } else{
//             echo "you don do mistake " . mysqli_error($conn);
//         }

        
//     }

//     mysqli_close($conn);
?>