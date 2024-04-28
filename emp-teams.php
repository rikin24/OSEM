<?php
include "./emp-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Teams</h2>
    <br>
    <div class="container d-flex justify-content-center align-items-center">
        <?php
        include "./php/db-config.php";
        // List all teams the current employee is a part of
        $sql = "SELECT * FROM teams WHERE empTID='$currentID' ORDER BY team_name ASC";
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
                        <td><?=$teamsData['team_desc'];?>
                        <td>
                            <div class="btn-group-sm">
                                <a href="emp-team-room.php?id=<?=$teamsData['id']?>" class="btn btn-outline-success">Enter Room</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>