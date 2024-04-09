<?php
include "./adm-UI.php";
?>

<body>
<h2 class="text-dark text-center p-3">Employees</h2>
<br>
<div class="d-flex justify-content-center align-items-center">
    <a href="adm-employees-add.php" class="btn btn-primary">Add Employee</a>
</div>
<br>
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
    $sql = "SELECT * FROM users WHERE position='employee' ORDER BY name ASC";
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
                    <td><?=$empData['name']?></td>
                    <td><?=$empData['email'];?></td>
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
