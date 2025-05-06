<?php

include('./include/connect.php');
ob_start();
include('basicIct.php');
include('expenses.php');
include('digitalSkill.php');

ob_end_clean();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">


</head>
<style>

</style>

<body>
  <section class="">
    <?php include "./include/sidebar.php"; ?>
    <div class="bg-opacity-75" style="margin-left:20%;">
      <div class="container">
        <div class="container mt-4">
          <div class="row gap-4 mb-3 ">
            <!-- Column 2: similar setup as Column 1 -->
            <div class="col-md-4 bg-success bg-opacity-25 p-4 rounded">
              <div class="d-flex gap-5 align-items-start">
                <i class="fas fa-wallet fs-5 bg-success rounded-circle text-white p-3"></i>
                <div>
                  <h5 class="text-uppercase">Income </h5>
                  <div class="fw-bold text-xxl  fs-3 text-success">
                    N<?= number_format($total_amount + $amount_earned); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- Column 3: similar setup as Columns 1 and 2 -->
            <div class="col-md-3 bg-warning bg-opacity-25 p-4 fs-4 rounded">
              <div class="d-flex gap-5 align-items-start">
                <i class="fas fa-credit-card text-white bg-warning p-3 rounded-circle fs-5"></i>
                <div>
                  <h5 class="text-uppercase">Expenses</h5>
                  <div class="fw-bold text-xxl fs-3 text-danger"><?= number_format($amount_spent); ?></div>
                </div>
              </div>

            </div>

            <!-- Column 3: similar setup as Columns 1 and 2 -->
            <div class="col-md-4 bg-primary bg-opacity-25 p-4 rounded">
              <div class="d-flex gap-5 align-items-start">
                <i class="fas fs-5 fa-book bg-primary text-white p-2 rounded-circle"></i>
                <div>
                  <h5 class="text-uppercase">Students</h5>
                  <div class="fw-bold text-xxl fs-4 text-success"><?= number_format($total_student); ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <canvas id="incomeExpenseChart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>

  </section>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('incomeExpenseChart').getContext('2d');
    const incomeExpenseChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Income', 'Expenses', 'Students'],
        datasets: [{
          label: 'Amount (₦)',
          data: [<?= $total_amount + $amount_earned ?>, <?= $amount_spent ?>, <?=$total_student ?>],
          backgroundColor: ['rgba(40, 167, 69, 0.5)', 'rgba(255, 193, 7, 0.5)', 'rgba(118, 248, 161, 0.5)'],
          borderColor: ['rgba(40, 167, 69, 1)', 'rgba(255, 193, 7, 1)', 'rgba(118, 248, 161, 0.5)'],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  </script>

</body>

</html>