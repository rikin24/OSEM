<?php
include "./man-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Teams</h2>
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <a href="#" class="btn btn-primary">Add Team</a>
    </div>
    <br>
    <div class="container d-flex justify-content-center align-items-center">
        <?php
        include "./php/db-config.php";
        // List all skills of currently logged in employee
        $sql = "SELECT * FROM teams ORDER BY team_name ASC";
        $teamsRead = mysqli_query($link, $sql);
        if (mysqli_num_rows($teamsRead)) { ?>
            <table class="table table-striped table-hover shadow-sm" style="width: 50%">
                <thead>
                <tr>
                    <th scope="col">Team</th>
                    <th scope="col">Description</th>
                    <th scope="col">Members</th>
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
                        <td><?=$teamsData['empTID'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>
