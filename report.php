<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="justify-content-center w-100 align-items-center d-flex">
    <form action="./include/submitReport.php" method="post" class="d-flex gap-2 bg-primary p-4 justify-content-left align-items-start w-50 flex-column">
        <h2 class="text-warning text-uppercase">Income</h2>

            <p>Printing Services</p>
            <select name="incomeDescription" class="p-3 border-0 rounded w-100" id="incomeDescription">
                <option value="">-- Select a Service --</option>
                <option value="typing and printing">Typing and Printing</option>
                <option value="photocopy">Photocopy</option>
                <option value="jambCbt">jambCbt</option>
            </select>
      
            <label for="Amount">Amount</label>
            <input type="number" name="amount" class="p-3 border-0 rounded w-100">

            <p>Digital Skill Academy</p>
            <select name="Course" class="p-3 border-0 rounded w-100" id="incomeDescription">
                <option value="">-- Select Course --</option>
                <option value="Computer Basics">Computer Basics</option>
                <option value="Basic Python Programming">Basic Python Programming</option>
                <option value="frontend Web Development">frontend Web Development</option>
                <option value="Graphic Design">Graphic Design</option>
            </select>
      
            <label for="Amount">No Of Student</label>
            <input type="number" name="noOfStudent" class="p-3 border-0 rounded w-100">

            <label for="Amount">Amount</label>
            <input type="number" name="price" class="p-3 border-0 rounded w-100">

            <p>Expenses for today</p>
            <textarea name="expensesDescription" id="expensesDescription" cols="50" placeholder="describe what you bought" class="p-2" rows="2"></textarea>
            
            <label for="Amount">Amount</label>
            <input type="number" name="amount3" class="p-3 border-0 rounded w-100">
       
        <button class=" btn btn-warning" name="submit" type="submit">Submit</button>
    </form>
    
</body>
</html>