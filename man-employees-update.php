<?php
include "./man-UI.php";
include "./php/man-emp-upd.php";
?>

<body>
<h2 class="text-dark text-center p-3">Update Employee</h2>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 20vh">
    <form class="p-4 rounded-3 bg-white align-items-center"
          style="width: 50%;"
          action="php/man-emp-upd.php"
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
            <!--Set employee data as placeholder in update form for selected employee-->
            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control"
                       type="text"
                       id="name"
                       name="name"
                       value="<?=$empData['name'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="mb-0">
                <label class="form-label">Select Position</label>
            </div>
            <select class="form-select mb-4"
                    name="position">
                <option selected value="employee">Employee</option>
                <option value="manager">Manager</option>
            </select>
            <input type="text"
                   name="id"
                   value="<?=$empData['id']?>"
                   hidden>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="update">Update</button>
            <a href="./man-employees.php" class="btn btn-secondary mx-2">Back</a>
        </div>
    </form>
</div>
</body>
