<?php
include "./man-UI.php";
include "./php/man-team-read.php";

$currentTeam = $teamData['team_name'];
$teamId = $teamData['id'];

// Fetch calendar data and convert to JSON before displaying on FullCalendar
$teamCalSql = "SELECT event_name, event_start, event_end FROM team_calendar WHERE teamCID='$teamId'";
$teamResult = mysqli_query($link, $teamCalSql);
// Team Calendar Data
$teamEvents = [];

while ($row = $teamResult->fetch_assoc()) {
    $teamEvents[] = [
        'title' => $row['event_name'],
        'start' => $row['event_start'],
        'end' => $row['event_end'],
        'color' => '#6610f2'
    ];
}

$teamEventsJson = json_encode($teamEvents);
?>

<script>
    // Render calendar with set styles and imported data
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay',
                center: 'title',
                right: 'prev,next today',
            },
            events: <?php echo $teamEventsJson; ?>,
        });
        calendar.render();
    });
</script>

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
    <div class="d-flex justify-content-center align-items-center">
        <a href="man-team-calendar-add.php?id=<?=$teamId?>" class="btn btn-primary">Add Event</a>
    </div>
    <div id="calendar" style="max-height: 550px;"></div>
    <br>
</div>
</body>
