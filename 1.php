<?php

include('include/connect.php');
include('./include/head.php');

$from = $_GET['from'] ?? null;
$to = $_GET['to'] ?? null;

if ($from && $to) {
    $sql = "SELECT * FROM expenses WHERE DATE(timestamp) BETWEEN '$from' AND '$to'";
} else {
    // Default: last 7 days
    $sql = "SELECT * FROM expenses WHERE DATE(timestamp) >= CURDATE() - INTERVAL 7 DAY";
}

$result = mysqli_query($conn, $sql);
$expense = mysqli_fetch_all($result, MYSQLI_ASSOC);


$result = mysqli_query($conn,$sql);

$expense = mysqli_fetch_all($result,MYSQLI_ASSOC);
if ($from && $to) {
    $amount = "SELECT SUM(amount) AS total FROM expenses WHERE DATE(timestamp) BETWEEN '$from' AND '$to'";
} else {
    $amount = "SELECT SUM(amount) AS total FROM expenses WHERE DATE(timestamp) >= CURDATE() - INTERVAL 7 DAY";
}

$total_result = $conn->query($amount);
$row = $total_result->fetch_assoc();
$amount_spent = $row["total"];

?>
       
        

<!-- modal for adding record -->

        

<!-- main table in the body starts here -->
        
    
  

    


  <?php include('./include/footer.php') ?>