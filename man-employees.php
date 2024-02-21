<?php
include "./man-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Employees</h2>
    <div class="d-flex justify-content-center align-items-center">
        <a href="man-employees-add.php" class="btn btn-primary">Add Employee</a>
    </div>
    <div class="container d-flex justify-content-center align-items-center"
         style="min-height: 20vh">
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
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    while($empData = mysqli_fetch_assoc($empRead)){
                        // Fetch data from database corresponding to SQL command earlier and display then iterate for each row
                        $i++;
                    ?>
                        <tr>
                            <td><?=$empData['name']?></td>
                            <td><?=$empData['email'];?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                <?php } ?>
    </div>
</body>
