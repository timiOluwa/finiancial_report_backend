<?php

include('./include/connect.php');
include('./include/header2.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * FROM `expenses` where `id` = '$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
    die ("wrong parameters". mysqli_error($conn));

} else{
    $expense = mysqli_fetch_assoc($result);
}


// updating form back to the database after submission

if(isset($_GET['id'])){
    $newId = $_GET['id'];
}

if(isset($_POST['submit'])){
    $expensesDescription = mysqli_real_escape_string($conn, $_POST['expensesDescription']);
    $amount = mysqli_real_escape_string($conn,$_POST['amountOfExpenses']);

    $sql = "UPDATE `expenses` SET `expensesDescription` = '$expensesDescription', `amount` = '$amount' where `id` = '$newId'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:expenses.php');
    } else{
        mysqli_error($conn);
    }
}

?>

<form method="post" action="update_expenses.php?id=<?=$id?>" class="form-group flex-column d-flex">

    <p>Expenses for today</p>
    <input name="expensesDescription" value="<?=$expense['expensesDescription']?>" id="expensesDescription" class="p-3">
            
    <label for="Amount">Amount</label>
    <input type="number" placeholder="amount" name="amountOfExpenses" value="<?=$expense['amount']?>" class="p-3 border-1 rounded w-100">
    
    <button name="submit" class="btn btn-primary mt-2 py-3">Submit</button>
</form>


<?php include('./include/footer.php');
?>