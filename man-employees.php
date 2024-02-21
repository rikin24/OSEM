<?php
include "./man-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Employees</h2>
    <div class="container d-flex justify-content-center align-items-center"
         style="min-height: 30vh">
                <?php
                include "./php/db-config.php";
                $sql = "SELECT * FROM users WHERE position='manager' ORDER BY id DESC";
                $empRead = mysqli_query($link, $sql);
                if (mysqli_num_rows($empRead)) { ?>
                    <table class="table table-striped table-hover shadow-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
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
                            <th scope="row"><?=$i?></th>
                            <td><?=$empData['name']?></td>
                            <td><?=$empData['email'];?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                <?php } ?>
    </div>
</body>
