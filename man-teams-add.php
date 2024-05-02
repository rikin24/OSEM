<?php
include "./man-UI.php";
?>

<body>
<h2 class="text-dark text-center p-3">Add Team</h2>
<div class="d-flex justify-content-center align-items-center">
    <form class="p-4 rounded-3 bg-white align-items-center"
          action="man-teams-add.php"
          method="get">
        <div class="form-group">
            <div class="mb-3 d-flex align-items-center gap-2">
                <input class="form-control" type="text" name="search" placeholder="Search employees">
                <button class="btn btn-secondary type="submit">Search</button>
            </div>
        </div>
    </form>
</div>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 20vh">
    <form class="p-4 rounded-3 bg-white align-items-center"
          style="width: 50%;"
          action="php/man-team-add.php"
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
                <label for="name">Team Name</label>
                <input class="form-control"
                       type="text"
                       id="teamName"
                       name="teamName">
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="email">Team Description (Optional)</label>
                <input class="form-control"
                       type="text"
                       id="teamDesc"
                       name="teamDesc">
            </div>
        </div>
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
            <table class="table table-striped table-hover shadow-sm" style="width: 100%">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Select</th>
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
                                <!--Select employee with corresponding unique id in database-->
                                <input type="checkbox" name="empTID[]" value="<?=$empData['id']?>">
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="createTeam">Add</button>
            <a href="./man-teams.php" class="btn btn-secondary mx-2">Back</a>
        </div>
    </form>
</div>
</body>
