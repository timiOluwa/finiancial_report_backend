
<?php

include('include/connect.php');
include('./include/header.php');

$from = $_GET['from'] ?? null;
$to = $_GET['to'] ?? null;

if ($from && $to) {
    $sql = "SELECT * FROM printingservices WHERE DATE(timestamp) BETWEEN '$from' AND '$to'";
} else {
    // Default: last 7 days
    $sql = "SELECT * FROM printingservices WHERE DATE(timestamp) >= CURDATE() - INTERVAL 7 DAY";
}

$result = mysqli_query($conn,$sql);

$basic_ict = mysqli_fetch_all($result,MYSQLI_ASSOC);
if ($from && $to) {
  
  $total = "SELECT SUM(amount) AS total FROM printingservices WHERE DATE(timestamp) BETWEEN '$from' AND '$to'";
} else {
  
  $total = "SELECT SUM(amount) AS total FROM printingservices WHERE DATE(timestamp) >= CURDATE() - INTERVAL 7 DAY";
}


$total_result =$conn->query($total);
$row = $total_result->fetch_assoc();
$total_amount = $row["total"];



?>

        <div class="header d-flex my-3 align-items-center justify-content-between">
            <h3 class="">Records for Printing Services</h3>
            <form method="get" class="d-flex gap-2 align-items-center">
                <label for="from" class="fw-bold text-success">From:</label>
                <input type="date" name="from" id="from" value="<?= $_GET['from'] ?? '' ?>" class="border border-success text-success p-2 rounded">

                <label for="to" class="fw-bold text-success">To:</label>
                <input type="date" name="to" id="to" value="<?= $_GET['to'] ?? '' ?>" class="border border-success text-success p-2 rounded">

                <button type="submit" class="btn btn-warning">Filter</button>
            </form>
            
            <button class="btn btn-success" data-toggle="modal" data-target="#addRecord">Add a record</button>

            
        </div>

<!-- modal for adding record -->

        <form action="add_ict.php" method="post">
<div class="modal fade" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase fw-bold text-body" id="exampleModalLabel">Add a New Record For Printing Service</h5>
   
      </div>
      <div class="modal-body">
       
            <div class="form-group">

            <select required name="incomeDescription" name class="p-3 border-2 border-secondary rounded w-100" id="incomeDescription">
                <option value="">-- Select a Service --</option>
                <option value="typing and printing">Typing and Printing</option>
                <option value="photocopy">Photocopy</option>
                <option value="jambCbt">jambCbt</option>
                <option    >others</option>
            </select>

                <label for="otherDescription" class="fw-bold mb-2 mt-1">Others</label>
                <input class="p-3 border-1 border-secondary rounded w-100"  placeholder="Specify the custom description of income" name="description" type="text">


                <label for="amount" class="fw-bold mb-2 mt-1" >Amount</label>
                <input class="p-3 border-1 border-secondary rounded w-100" required placeholder="Enter amount made" name="amount" type="number">
                
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

    <table class="w-100 table-bordered table-hover">
        <thead class="bg-secondary">
            <tr class=" text-white">
                <th class="px-2 py-2">Day</th>
                <th class="px-2 py-2">Income Description</th>
                <th class="px-2 py-2">Amount</th>
                <th class="px-2 py-2">Edit</th>
            </tr>
        </thead>
        <?php
        if(isset($_GET['message'])){
          $message = $_GET['message'];
          echo "$message";
         
        }
        
    ?>



        <tbody>

            <?php 
            foreach($basic_ict as $ict):

           

            ?>
            <tr>
                <th class="border px-2 py-2"><?= $ict["timestamp"]; ?></th>
                <th class="border px-2 py-2"><?=$ict["incomeDescription"]; ?></th>
                <th class="border px-2 py-2"><?= number_format($ict["amount"])?></th>
                <th class="border px-2 py-2">
                    <a href="update_ict.php?id=<?=$ict["id"]?>" class="btn text-white btn-success" >Update</a>
                   
                </th>

            </tr>
         
            <?php endforeach ?>
                <th colspan="2" class="border px-2 text-success py-2 fw-bold text-uppercase"> Total Income</th>
               
                <th class="border px-2 text-white py-2 fw-bold bg-success text-uppercase"><?= "= ". number_format($total_amount); ?> </th>
                <th class="border px-2"></th>

        </tbody>
    </table>
  
<!-- <p class="text-danger"><?= $message?></p> -->
    
<!-- Modal For Edit -->
<form action="">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit an Income</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
       
            <div class="form-group">

            <select required name="incomeDescription" class="p-3 border-0 rounded w-100" id="incomeDescription">
                <option value="">-- Select a Service --</option>
                <option value="typing and printing">Typing and Printing</option>
                <option value="photocopy">Photocopy</option>
                <option value="jambCbt">jambCbt</option>
            </select>
                <label for="amount">Amount</label>
                <input class="p-2 w-100" type="number">
            </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>

  <?php include('./include/footer.php') ?>