<?php
include "./man-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Add Employee</h2>
    <div class="container d-flex justify-content-center align-items-center"
         style="min-height: 20vh">
        <form class="p-4 rounded-3 bg-white align-items-center"
              style="width: 50%;"
              action="php/man-emp-add.php"
              method="post">
            <?php if (isset($_GET['error'])) { ?>
                <!--Fetch appropriate error-->
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } else if (isset($_GET['success'])) { ?>
                <!--Fetch success message-->
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input class="form-control"
                           type="text"
                           id="name"
                           name="name"
                           value="<?php if(isset($_GET['name']))
                               echo($_GET['name']); ?>"
                           placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control"
                           type="email"
                           id="email"
                           name="email"
                           value="<?php if(isset($_GET['email']))
                               echo($_GET['email']); ?>"
                           placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control"
                           type="password"
                           id="password"
                           name="password"
                           value="<?php if(isset($_GET['email']))
                               echo($_GET['email']); ?>"
                           placeholder="Enter password">
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit"
                        class="btn btn-primary mx-2"
                        name="create">Add</button>
                <a href="./man-employees.php" class="btn btn-secondary mx-2">Back</a>
            </div>
        </form>
    </div>
</body>
