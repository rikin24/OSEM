<?php
include "./emp-UI.php";
include "./php/emp-team-read.php";
$currentTeam = $teamData['team_name'];
?>

<body>
    <h2 class="text-dark text-center p-3"><?=$teamData['team_name']?></h2>
    <br>
    <div class="container">
        <h4>Members</h4>
        <?php
        include "./php/db-config.php";
        // List all team members' details in users table, by taking user IDs corresponding to foreign key empTID in teams table
        $sql = "SELECT u.* FROM users u JOIN teams t ON u.id = t.empTID WHERE t.team_name ='$currentTeam'";
        $teamsRead = mysqli_query($link, $sql);
        if (mysqli_num_rows($teamsRead)) { ?>
            <table class="table table-striped table-hover shadow-sm" style="width: 25%">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
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
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>
