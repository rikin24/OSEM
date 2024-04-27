<?php
include "./man-UI.php";
include "./php/man-team-upd.php";
$currentTeam = $teamData['team_name'];
?>

<body>
<h2 class="text-dark text-center p-3">Update Team</h2>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 20vh">
    <form class="p-4 rounded-3 bg-white align-items-center"
          style="width: 50%;"
          action="php/man-team-upd.php"
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
                <input type="text"
                       name="currentTeamName"
                       value="<?=$teamData['team_name']?>"
                       hidden>
                <label for="name">Team Name</label>
                <input class="form-control"
                       type="text"
                       id="teamName"
                       name="teamName"
                       value="<?=$teamData['team_name']?>">
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="email">Team Description (Optional)</label>
                <input class="form-control"
                       type="text"
                       id="teamDesc"
                       name="teamDesc"
                       value="<?=$teamData['team_desc']?>">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-0">
                <label class="form-label">Team Members</label>
            </div>
            <div class="mb-3">
                <?php
                include "./php/db-config.php";
                // List all team members' details in users table, by taking user IDs corresponding to foreign key empTID in teams table
                $sql = "SELECT u.* FROM users u JOIN teams t ON u.id = t.empTID WHERE t.team_name ='$currentTeam'";
                $teamsRead = mysqli_query($link, $sql);
                if (mysqli_num_rows($teamsRead)) { ?>
                    <table class="table table-striped table-hover shadow-sm" style="width: 100%">
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
                        while($teamsData = mysqli_fetch_assoc($teamsRead)){
                            // Fetch data from database corresponding to SQL command earlier, then display each row
                            $i++;
                            ?>
                            <tr>
                                <td><?=$teamsData['name']?></td>
                                <td><?=$teamsData['email']?></td>
                                <td>
                                    <div class="btn-group-sm">
                                        <!--Fetch selected skill to be deleted for the employee being updated-->
                                        <a href="php/man-team-emp-rem.php?id=<?=$teamsData['id']?>&team_name=<?=$currentTeam?>"
                                           class="btn btn-outline-danger mx-1">Remove</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-0">
                <label class="form-label">Add Team Members</label>
            </div>
            <div class="mb-3">
                <?php
                $sql = "SELECT * FROM users WHERE position='employee' AND 
                        id NOT IN (
                            SELECT empTID FROM teams WHERE team_name ='$currentTeam'
                        ) ORDER BY name ASC;";

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
                                <td><?=$empData['name']?></td>
                                <td><?=$empData['email'];?></td>
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
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="update">Update</button>
            <a href="./man-teams.php" class="btn btn-secondary mx-2">Back</a>
        </div>
    </form>
</div>
</body>