<?php

include('./include/connect.php');
include('./include/head.php');
 if(isset($_GET['id'])){
    $newid = $_GET['id'];
   
 }

 $sql = "SELECT * FROM `digitalskillacademy` where `id` = '$newid'" ;
 $result = mysqli_query($conn, $sql);
 if($result){
    $skills = mysqli_fetch_assoc($result);
 }

//  submitting the edited form to the database

if(isset($_POST['submit'])){
    $course = $_POST['courses'];
    $noOfStudent = $_POST['noOfStudent'];
    $amount = $_POST['amount'];

    $sql = "UPDATE `digitalskillacademy` SET `course` = '$course', `noOfStudent` = '$noOfStudent' ,`amount` = '$amount' WHERE `id` = '$newid'";

    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:digitalSkill.php?message = data updated successfully');
    } else{
        die ('Failed to connect due to '. mysqli_error());
    }
}

?>
<?php include('./include/sidebar.php') ?>
<form action="update_digital.php?id=<?=$newid?>" class="p-5" style="margin-left: 20%;" method="post">
<h1 class="p-4 text-center rounded position-sticky bg-success text-white text-uppercase fw-bold  h-screen" style="width: 95%"><i class="fas fa-book me-3"></i>update Digital skill records</h1>
<div class="form-group">
<p class="text-left fw-bold text-uppercase ">Edit your Course</p>
<select required name="courses" class="p-3 border-2 border-secondary rounded w-100" id="incomeDescription">
    <option value="<?= $skills["course"]?>"><?= $skills["course"]?></option>
    <option value="Certificate in Computer Basics">Certificate in Computer Basics</option>
    <option value="Certificate in Frontend Web Development">Certificate in Frontend Web Development</option>
    <option value="Certificate in Graphic Design">Certificate in Graphic Design</option>
    <option  value="Certificate in Basic Python Programming">Certificate in Basic Python Programming</option>
</select>

    <label for="otherDescription" class="fw-bold mb-2 mt-1">No of Student</label>
    <input class="p-3 border-1 border-secondary rounded w-100" value="<?=$skills["noOfStudent"] ?>"  placeholder="Specify the amount of student that registered" name="noOfStudent" type="number">

    <label for="amount" class="fw-bold mb-2 mt-1" >Amount</label>
    <input class="p-3 border-1 border-secondary rounded w-100" value="<?=$skills["amount"] ?>"  required placeholder="Enter amount made" name="amount" type="number">

    <button name="submit" class="btn btn-primary mt-3" type="submit">Submit</button>
    
</div>
</form>










<?php

include("./include/footer.php");
?>