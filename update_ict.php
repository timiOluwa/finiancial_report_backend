<?php 
    include('./include/connect.php');
    include('./include/head.php');
    if(isset($_GET['id'])){
        $id= $_GET['id'];
    }

    $sql = "SELECT * FROM `printingservices` where `id` = '$id'";

    $result = mysqli_query($conn,$sql);

    if(!$result){
        die("wrong syntax". mysqli_error($conn));
    }else{
        $row = mysqli_fetch_assoc($result);

    }
?>


<?php

include('./include/connect.php');
    if(isset($_POST['submit'])){
        $description =mysqli_real_escape_string($conn, $_POST['incomeDescription']);
        $amountUpdate = mysqli_real_escape_string($conn, $_POST['amount']);

        $newId= $_GET['id'];

        $sqlQuery = "UPDATE `printingservices` SET `incomeDescription` = '$description' , `amount` =  '$amountUpdate' WHERE   `id` = '$newId'";

        $result = mysqli_query($conn , $sqlQuery);
        if(!$result){
            die ("failed to connect".mysqli_error($conn));
        }
        else{
            header('location:basicIct.php?message=you have successfully updated your data');
        }
    }
?>

<?php include('./include/sidebar.php') ?>
<form action="update_ict.php?id=<?=$id?>" method="post" class="form-group p-5"style="margin-left: 20%;" >
            <h1 class="p-4 text-center rounded position-sticky bg-success text-white text-uppercase fw-bold  w-100" style="width: 95%"><i class="fas fa-computer mx-3"></i>update Basic ICT Records</h1>
            <label class="fw-bold mb-2 mt-1" for="incomeDescription">Description</label>
            <select required name="incomeDescription"  class="p-3 border-2 border-secondary rounded w-100" id="incomeDescription">
                <option value="<?= $row['incomeDescription']?>"><?= $row['incomeDescription']?></option>
                <option value="typing and printing">Typing and Printing</option>
                <option value="photocopy">Photocopy</option>
                <option value="jambCbt">jambCbt</option>
                <option    >others</option>
            </select>


                <label for="amount" class="fw-bold mb-2 mt-1" >Amount</label>
                <input class="p-3 border-1 border-secondary rounded w-100" value="<?= $row['amount']?>" required placeholder="Enter amount made" name="amount" type="number">

                <button class="btn btn-primary w-100 mt-2 px-3" name="submit" type="submit">Update</button>
                
</form>

<?php include('./include/footer.php') ?>