<?php
include "./emp-UI.php";
?>

<body>
    <h2 class="text-dark text-center p-3">Teams</h2>
    <div class="d-flex justify-content-center align-items-center">
        <form class="p-4 rounded-3 bg-white align-items-center"
              action="emp-teams.php"
              method="get">
            <div class="form-group">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <input class="form-control" type="text" name="search" placeholder="Search teams">
                    <button class="btn btn-secondary type="submit">Search</button>
                </div>
            </div>
        </form>
        <br>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <?php
        include "./php/db-config.php";

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // List all teams the current employee is a part of
        $sql = "SELECT * FROM teams WHERE empTID='$currentID'";

        if (!empty($search)) {
            $sql .= " AND (team_name LIKE '%$search%' OR team_desc LIKE '%$search%')";
        }

        $sql .= " ORDER BY team_name ASC";

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
                        <td><?php echo htmlspecialchars($teamsData['team_name']); ?></td>
                        <td><?php echo htmlspecialchars($teamsData['team_desc']); ?></td>
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
