<!DOCTYPE html>
<html>
<head>
    <title>OSEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-styles.css">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center"
         style="min-height: 100vh">
        <h1 class="position-absolute top-0 start-50 translate-middle-x p-4">Online Smart Employee Manager</h1>
        <form class="border shadow-sm p-4 rounded-3"
              style="width: 450px;"
              action="php/login-check.php"
              method="post">
            <h1 class="text-center text-primary fs-2 p-3">Login</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-1">
                <label class="form-label">Select Role</label>
            </div>
            <select class="form-select mb-4">
                <option selected value="manager">Manager</option>
                <option value="employee">Employee</option>
            </select>
            <div class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>