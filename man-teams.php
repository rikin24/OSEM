<?php
include "./man-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Teams</h2>
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <a href="man-teams-add.php" class="btn btn-primary">Add Team</a>
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
        // List all teams with unique names
        // Inner join used to remove duplicates
        // MIN used to take the lowest team id value as the one to reference for teams with duplicate names
        $sql = "SELECT t1.* FROM teams t1 INNER JOIN (
                SELECT MIN(id) AS id, team_name FROM teams GROUP BY team_name
                ) t2 ON t1.id = t2.id ORDER BY t1.team_name ASC";
        $teamsRead = mysqli_query($link, $sql);
        if (mysqli_num_rows($teamsRead)) { ?>
            <table class="table table-striped table-hover shadow-sm" style="width: 50%">
                <thead>
                <tr>
                    <th scope="col">Team</th>
                    <th scope="col">Description</th>
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
                        <td><?=$teamsData['team_name']?></td>
                        <td><?=$teamsData['team_desc'];?></td>
                        <td>
                            <div class="btn-group-sm">
                                <a href="man-team-room.php?id=<?=$teamsData['id']?>" class="btn btn-outline-success">Enter Room</a>
                                <a href="man-teams-update.php?id=<?=$teamsData['id']?>" class="btn btn-outline-primary">Update</a>
                                <a href="php/man-team-rem.php?team_name=<?=$teamsData['team_name']?>" class="btn btn-outline-danger">Remove</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>
