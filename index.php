<!DOCTYPE html>
<html>
<head>
    <title>OSEM Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-styles.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center"
         style="min-height: 100vh">
        <h1 class="text-dark position-absolute top-0 start-50 translate-middle-x p-4">Online Smart Employee Manager</h1>
        <form class="border shadow-sm p-4 rounded-3 bg-white"
              style="width: 450px;"
              action="php/login-check.php"
              method="post">
            <h1 class="text-center text-primary fs-2 p-3">Login</h1>

            <!--Fetch appropriate error-->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$_GET['error']?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
            <div class="mb-1">
                <label class="form-label">Select Position</label>
            </div>
            <select class="form-select mb-4"
                name="position">
                <option selected value="employee">Employee</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
            </select>
            <div class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>