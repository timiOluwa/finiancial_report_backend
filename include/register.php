<?php

include('connect.php');

if (isset($_POST["submit"])) {

    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $sql = "INSERT INTO registration (firstname, lastname, email) VALUES ('$firstname', '$lastname','$email')";
    if (mysqli_query($conn,$sql)){
        echo "Registration successful bro";
    } else{
        echo "Wetin happen: " . mysqli_error($conn);
    }

    
}

mysqli_close($conn);

?>