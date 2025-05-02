<?php

include('include/connect.php');
include('./include/header2.php');

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
$amount_earned = $row["total"];

?>

        <div class="header d-flex my-3 align-items-center justify-content-between">
            <h3 class="">Records for all Expenses</h3>
            <form method="get" class="d-flex gap-2 align-items-center">
                <label for="from" class="fw-bold text-success">From:</label>
                <input type="date" name="from" id="from" value="<?= $_GET['from'] ?? '' ?>" class="border border-success text-success p-2 rounded">

                <label for="to" class="fw-bold text-success">To:</label>
                <input type="date" name="to" id="to" value="<?= $_GET['to'] ?? '' ?>" class="border border-success text-success p-2 rounded">

                <button type="submit" class="btn btn-warning">Filter</button>
            </form>

            
            <button class="btn btn-success" data-toggle="modal" data-target="#addRecord">Add a record</button>

            
        </div>
        <?php
            if ($from && $to) {
                echo "<p class='text-success fw-bold'>Showing results from <strong>$from</strong> to <strong>$to</strong></p>";
            } else {
                echo "<p class='text-success fw-bold'>Showing results from the last 7 days</p>";
            }
            
        ?>

<!-- modal for adding record -->

        <form action="add_expenses.php" method="post">
<div class="modal fade" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase fw-bold text-danger text-body" id="exampleModalLabel">Add a New Record For your Expenses</h5>
   
      </div>
      <div class="modal-body">
       
            <div class="form-group flex-column d-flex">

            <p>Expenses for today</p>
            <textarea name="expensesDescription" id="expensesDescription" cols="50" placeholder="describe what you bought" class="p-2" rows="2"></textarea>
            
            <label for="Amount">Amount</label>
            <input type="number" placeholder="amount" name="amountOfEXpenses" class="p-3 border-1 rounded w-100">
                
            </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- main table in the body starts here -->
        
    <table class="w-100 table-bordered mb-5 table-hover">
        <thead class="bg-secondary">
            <tr class=" text-white">
                <th class="px-2 py-2">Day</th>
                <th class="px-2 py-2">Expense Description</th>
                <th class="px-2 py-2">Amount</th>
                <th class="px-2 py-2">Edit</th>
            </tr>
        </thead>
        <?php
      
        
    ?>

        <tbody>

            <?php 
              if(isset($_GET['message'])){
                $message = $_GET['message'];
                echo "$message";
               
              }
            foreach($expense as $expenses):

      

            ?>
            <tr>
                <th class="border px-2 py-2"><?= $expenses["timestamp"]; ?></th>
                <th class="border px-2 py-2"><?=$expenses["expensesDescription"] ?></th>
                <th class="border px-2 py-2"><?= number_format($expenses["amount"])?></th>
                <th class="border px-2 py-2">
                    <a href="update_expenses.php?id=<?=$expenses["id"]?>" class="btn text-white btn-danger" >Update</a>
                </th>

            </tr>
         
            <?php endforeach ?>
                <th colspan="2" class="border px-2 text-danger py-2 fw-bold text-uppercase"> Total Income</th>
               
                
                <th class="border px-2 text-white py-2 fw-bold bg-danger text-uppercase"><?= "= ". number_format($amount_earned); ?> </th>
                

        </tbody>
    </table>
  

    


  <?php include('./include/footer.php') ?>