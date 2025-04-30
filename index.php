<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="flex-column d-flex vh-100 justify-content-center align-items-center">

        <form action="./include/register.php" class="bg-primary w-50 p-5 " method="post">
                    <h2 class="fw-bolder">Login</h2>
                    <p class="introduce fw-bold">Welcome back to our page </p>
                   
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstname" name="firstname">
                        <label for="floatingInput">First name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastname" name="lastname">
                        <label for="floatingInput">Last name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    
                    <p class="fw-bold">Don't have an account <a href="signup.php" class="text-danger">Sign up</a></p>
                    <button class="btn btn-warning mt-1" name="submit">Login</button>
                </form>
</body>
</html>