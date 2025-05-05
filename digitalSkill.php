<?php

include('include/connect.php');
include('./include/head.php');

$from = $_GET['from'] ?? null;
$to = $_GET['to'] ?? null;

if ($from && $to) {
    $sql = "SELECT * FROM digitalskillacademy WHERE DATE(timestamp) BETWEEN '$from' AND '$to'";
} else {
    // Default: last 7 days
    $sql = "SELECT * FROM digitalskillacademy WHERE DATE(timestamp) >= CURDATE() - INTERVAL 7 DAY";
}

$result = mysqli_query($conn, $sql);
$digital_skill = mysqli_fetch_all($result, MYSQLI_ASSOC);


$result = mysqli_query($conn, $sql);

$digital_skill = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($from && $to) {
    $total = "SELECT SUM(noOfStudent) AS total FROM digitalskillacademy WHERE DATE(timestamp) BETWEEN '$from' AND '$to'";
    $amount = "SELECT SUM(amount) AS total FROM digitalskillacademy WHERE DATE(timestamp) BETWEEN '$from' AND '$to'";
} else {
    $total = "SELECT SUM(noOfStudent) AS total FROM digitalskillacademy WHERE DATE(timestamp) >= CURDATE() - INTERVAL 7 DAY";
    $amount = "SELECT SUM(amount) AS total FROM digitalskillacademy WHERE DATE(timestamp) >= CURDATE() - INTERVAL 7 DAY";
}

$total_result = $conn->query($total);
$row = $total_result->fetch_assoc();
$total_student = $row["total"];

$total_result = $conn->query($amount);
$row = $total_result->fetch_assoc();
$amount_earned = $row["total"];

?>


<body class="">


    <!-- modal for adding record -->

    <form action="add_digital.php" method="post">
        <div class="modal fade" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase fw-bold text-danger text-body" id="exampleModalLabel">Add
                            a
                            New Record For Digital Skill Academy</h5>

                    </div>
                    <div class="modal-body">

                        <div class="form-group">

                            <select required name="courses" class="p-3 border-2 border-secondary rounded w-100"
                                id="incomeDescription">
                                <option value="">-- Select a Course --</option>
                                <option value="Certificate in Computer Basics">Certificate in Computer Basics</option>
                                <option value="Certificate in Frontend Web Development">Certificate in Frontend Web
                                    Development</option>
                                <option value="Certificate in Graphic Design">Certificate in Graphic Design</option>
                                <option value="Certificate in Basic Python Programming">Certificate in Basic Python
                                    Programming</option>
                            </select>

                            <label for="otherDescription" class="fw-bold mb-2 mt-1">No of Student</label>
                            <input class="p-3 border-1 border-secondary rounded w-100"
                                placeholder="Specify the custom description of income" name="noOfStudent" type="number">


                            <label for="amount" class="fw-bold mb-2 mt-1">Amount</label>
                            <input class="p-3 border-1 border-secondary rounded w-100" required
                                placeholder="Enter amount made" name="amount" type="number">

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


    <section class="d-flex bg-opacity-50 w-100 ">
        <div class="w-100 d-flex ">

            <?php include "./include/sidebar.php"; ?>

            <!-- second side of view -->
            <div class=" align-items-center bg-secondary bg-opacity-10 w-100 p-5 justify-content-center" style="margin-left: 20%; width: 100%;" >
                <h1 class="p-4 text-center rounded position-sticky bg-success text-white text-uppercase fw-bold  h-screen" style="width: 95%"><i class="fas fa-book me-3"></i> Digital skill records</h1>
                <div class="bg-white mt-1 py-5 px-4 bg-opacity-75  h-screen rounded"
                style="width: 95%">
                <?php
                if ($from && $to) {
                    echo "<p class='text-success fw-bold'>Showing results from <strong>$from</strong> to <strong>$to</strong></p>";
                } else {
                    echo "<p class='text-success fw-bold'>Showing results from the last 7 days</p>";
                }

                ?>
                <div class="header d-flex my-3 align-items-center justify-content-around" style="width: 100%;">

                    <button class="btn btn-success me-4" data-toggle="modal" data-target="#addRecord">Add a
                        record</button>

                    <h4 class="">Records for Digital Skill Academy</h4>
                    <form method="get" class="d-flex gap-2 align-items-center">
                        <label for="from" class="fw-bold text-success">From:</label>
                        <input type="date" name="from" id="from" value="<?= $_GET['from'] ?? '' ?>"
                            class="border border-success text-success p-2 rounded">

                        <label for="to" class="fw-bold text-success">To:</label>
                        <input type="date" name="to" id="to" value="<?= $_GET['to'] ?? '' ?>"
                            class="border border-success text-success p-2 rounded">

                        <button type="submit" class="btn my-3 btn-warning">Filter</button>
                    </form>





                </div>
                <table class="w-100 table-bordered mb-5 table-hover">
                    <thead class="bg-secondary">
                        <tr class=" text-white">
                            <th class="px-2 py-2">Day</th>
                            <th class="px-2 py-2">Course</th>
                            <th class="px-2 py-2">No Of Student</th>
                            <th class="px-2 py-2">Amount</th>
                            <th class="px-2 py-2">Edit</th>
                        </tr>
                    </thead>
                    <?php


                    ?>



                    <tbody>

                        <?php
                        if (isset($_GET['message'])) {
                            $message = $_GET['message'];
                            echo "$message";

                        }
                        foreach ($digital_skill as $skill):



                            ?>
                            <tr>
                                <th class="border px-2 py-2"><?= $skill["timestamp"]; ?></th>
                                <th class="border px-2 py-2"><?= $skill["course"] ?></th>
                                <th class="border px-2 py-2"><?= number_format($skill["noOfStudent"]) ?></th>
                                <th class="border px-2 py-2"><?= number_format($skill["amount"]) ?></th>
                                <th class="border px-2 py-2">
                                    <a href="update_digital.php?id=<?= $skill["id"] ?>"
                                        class="btn text-white btn-success">Update</a>

                                </th>

                            </tr>

                        <?php endforeach ?>
                        <th colspan="2" class="border px-2 text-success py-2 fw-bold text-uppercase"> Total Income</th>

                        <th class="border px-2 text-white py-2 fw-bold bg-success ">
                            <?= "= " . number_format($total_student) . " students"; ?>
                        </th>
                        <th class="border px-2 text-white py-2 fw-bold bg-success text-uppercase">
                            <?= "= " . number_format($amount_earned); ?>
                        </th>
                        <th class="border px-2"></th>

                    </tbody>
                </table>

            </div>
            </div>
        </div>
        <?php include('./include/footer.php') ?>
    </section>
</body>

</html>