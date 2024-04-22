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
                       value="<?=$empData['name']?>">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-0">
                <label class="form-label">Skills</label>
            </div>
            <div class="mb-3">
                <?php
                include "./php/db-config.php";
                // Display current existing skills for selected employee
                $sql = "SELECT * FROM skills WHERE empID='$id' ORDER BY skill_name ASC";
                $skillsRead = mysqli_query($link, $sql);
                if (mysqli_num_rows($skillsRead)) { ?>
                    <table class="table table-striped table-hover shadow-sm" style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col">Skill</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
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
                                <td><?=$skillsData['skill_name']?></td>
                                <td><?=$skillsData['skill_desc'];?></td>
                                <td>
                                    <div class="btn-group-sm">
                                        <!--Fetch selected skill to be deleted for the employee being updated-->
                                        <a href="php/man-emp-skill-rem.php?empID=<?=$empData['id']?>&skill_name=<?=$skillsData['skill_name']?>"
                                           class="btn btn-outline-danger mx-1">Remove</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <input type="text"
                   name="id"
                   value="<?=$empData['id']?>"
                   hidden>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-3">
                <label for="name">Add Skill</label>
                <input class="form-control"
                       type="text"
                       id="skillName"
                       name="skillName"
                       value="">
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="name">Skill Description (Optional)</label>
                <input class="form-control"
                       type="text"
                       id="skillDesc"
                       name="skillDesc"
                       value="">
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="update">Update</button>
            <a href="./man-employees.php" class="btn btn-secondary mx-2">Back</a>
        </div>
    </form>
</div>
</body>
