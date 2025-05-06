<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>minute</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
</head>
<body>
    <?php include('./include/sidebar.php') ?>
    
    <section style="margin-left:20% " class="p-5 ">
    <h1 class="p-4 text-center w-100 rounded position-sticky bg-success text-white text-uppercase fw-bold  h-screen" style="width: 95%"><i class="fas fa-receipt me-3"></i>Minutes</h1>
    <button class="btn my-2 btn-secondary">New Minute</button>


<div class="row">
      <div class="accordion col-md-9" id="accordionExample" >
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Opening Prayer
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body row">
        <p>The opening prayer was led by MD</p>
      </div>
    </div>
  </div>

  <!-- second accordion item -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Opening Remarks
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <p>MD welcomed everyone to the 1st meeting of the year. She urged everyone to be dedicated, focused and run with the vision of the organisation.</p>
      </div>
    </div>
  </div>

  <!-- third accordion item -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Attendance
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ol>
            <li> Emmanuel ADETIBA(CEO)  <input type="checkbox"></li>
            <li> Joy ADETIBA(MD)   <input type="checkbox"></li>
            <li> Oluwagbenga Jimoh  <input type="checkbox"></li>
            <li> Mayomi Odewaye   <input type="checkbox"></li>
            <li> Blessing Adekunle  <input type="checkbox"></li>
            <li>Babailo Oluwatimilehin <input type="checkbox"></li>
        </ol>
      </div>
    </div>
  </div>

  <!-- fourth accordion item -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      Minutes of Last Meeting
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <p>No minute was read as this is the first for the year</p>
      </div>
    </div>
  </div>

   <!-- fifth accordion item -->
   <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
      Matters Arising
      </button>
    </h2>
    <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ol>
            <li>The systems in the hub have been fixed.</li>
            <li>The VGA cable has been brought.</li>
            <li>6 systems are up and running.</li>
            <li>Gbenga reached out to Gbemi to come and pick the system he purchased</li>
            <li>Gbenga would go with the system for repairs.</li>
            <li>Gbenga to give Mayomi a new laptop for the CBT project.</li>
            <li>Poster/Hand bills to be updated for printing.</li>
            <li>Gbenga to print the poster.</li>
            <li>Timilehin to take over the social media platform, create a WhatsApp channel, interface with Blessing to sort it.</li>
        </ol>

      </div>
    </div>
  </div>

    <!-- sixth accordion item -->
    <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesixx" aria-expanded="false" aria-controls="collapsefive">
      Business Of The Day
      </button>
    </h2>
    <div id="collapsesixx" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ol>
            <li>The systems in the hub have been fixed.</li>
            <li>The VGA cable has been brought.</li>
            <li>6 systems are up and running.</li>
            <li>Gbenga reached out to Gbemi to come and pick the system he purchased</li>
            <li>Gbenga would go with the system for repairs.</li>
            <li>Gbenga to give Mayomi a new laptop for the CBT project.</li>
            <li>Poster/Hand bills to be updated for printing.</li>
            <li>Gbenga to print the poster.</li>
            <li>Timilehin to take over the social media platform, create a WhatsApp channel, interface with Blessing to sort it.</li>
        </ol>

      </div>
    </div>
  </div>
</div>
<div class="col-md-3 " >
    <div class="d-flex align-items-center bg-danger text-white p-2 justify-content-around">
    <h4>May, 2025</h4>
    <i class="fas fs-4 text-tertiary fa-calendar"></i>
    </div>
    <div class="p-3 bg-danger bg-opacity-10" style="background-color: light-pink;">
        <ul>
            <li>week1</li>
            <li>week2</li>
            <li>week3</li>
            <li>week4</li>
        </ul>
    </div>
    
</div>
</div>
<!-- accordion starts here -->
  
    </section> 

<script src="./assets/js/bootstrap.bundle.js"></script>
</body>
</html>