<?php
include "./adm-UI.php";
?>

<body>
<h2 class="text-dark text-center p-3">Employees</h2>
<br>
<div class="d-flex justify-content-center align-items-center">
    <a href="adm-employees-add.php" class="btn btn-primary">Add Employee</a>
    <br>
</div>
<div class="d-flex justify-content-center align-items-center">
    <form class="p-4 rounded-3 bg-white align-items-center"
          action="adm-employees.php"
          method="get">
        <div class="form-group">
            <div class="mb-3 d-flex align-items-center gap-2">
                <input class="form-control" type="text" name="search" placeholder="Search employees">
                <button class="btn btn-secondary type="submit">Search</button>
            </div>
        </div>
    </form>
    <br>
</div>
<?php if (isset($_GET['error'])) { ?>
    <!--Fetch appropriate error-->
    <div class="alert alert-danger start-50 translate-middle-x my-3 text-center" style="width: 20%" role="alert">
        <?php echo $_GET['error']; ?>
    </div>
<?php } else if (isset($_GET['success'])) { ?>
    <!--Fetch success message-->
    <div class="alert alert-success start-50 translate-middle-x my-3 text-center" style="width: 20%" role="alert">
        <?php echo $_GET['success']; ?>
    </div>
<?php } ?>
<div class="container d-flex justify-content-center align-items-center">
    <?php
    include "./php/db-config.php";

    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM users WHERE position='employee'";

    if (!empty($search)) {
        $sql .= " AND (name LIKE '%$search%' OR email LIKE '%$search%')";
    }

    $sql .= " ORDER BY name ASC";

    $empRead = mysqli_query($link, $sql);
    if (mysqli_num_rows($empRead)) { ?>
        <table class="table table-striped table-hover shadow-sm" style="width: 50%">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            while($empData = mysqli_fetch_assoc($empRead)){
                // Fetch data from database corresponding to SQL command earlier, then display each row
                $i++;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($empData['name']); ?></td>
                    <td><?php echo htmlspecialchars($empData['email']); ?></td>
                    <td>
                        <div class="btn-group-sm">
                            <!--Update/delete employee with corresponding unique id in database-->
                            <a href="adm-employees-update.php?id=<?=$empData['id']?>" class="btn btn-outline-primary">Update</a>
                            <a href="php/adm-emp-rem.php?id=<?=$empData['id']?>"
                               class="btn btn-outline-danger mx-1">Remove</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
</body>
