<?php
include "./emp-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Skills</h2>
    <div class="d-flex justify-content-center align-items-center">
        <form class="p-4 rounded-3 bg-white align-items-center"
              action="emp-skills.php"
              method="get">
            <div class="form-group">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <input class="form-control" type="text" name="search" placeholder="Search skills">
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

        // List all skills of currently logged in employee
        $sql = "SELECT * FROM skills WHERE empID='$currentID'";

        if (!empty($search)) {
            $sql .= " AND (skill_name LIKE '%$search%' OR skill_desc LIKE '%$search%')";
        }

        $sql .= " ORDER BY skill_name ASC";

        $skillsRead = mysqli_query($link, $sql);
        if (mysqli_num_rows($skillsRead)) { ?>
            <table class="table table-striped table-hover shadow-sm" style="width: 50%">
                <thead>
                <tr>
                    <th scope="col">Skill</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                while($skillsData = mysqli_fetch_assoc($skillsRead)){
                    // Fetch data from database corresponding to SQL command earlier, then display each row
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($skillsData['skill_name']); ?></td>
                        <td><?php echo htmlspecialchars($skillsData['skill_desc']); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>