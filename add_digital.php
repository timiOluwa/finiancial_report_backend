<?php
include('./include/connect.php');

if(isset($_POST['submit'])){
    $course = mysqli_real_escape_string($conn, $_POST['courses']);
    $noOfStudent = mysqli_real_escape_string($conn, $_POST['noOfStudent']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);


    $sql = "INSERT INTO digitalskillacademy (course, noOfstudent, amount) VALUES ('$course', '$noOfStudent', '$amount')";

    if(mysqli_query($conn, $sql,)){
        echo "Connected Successfully";
        header('location:digitalSkill.php?message = added successfully');
    } else{
        echo "you don do mistake". mysqli_error($conn);
    }
}
?>