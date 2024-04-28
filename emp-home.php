<?php
include "./emp-UI.php";

// Fetch calendar data and convert to JSON before displaying on FullCalendar
$indCalSql = "SELECT event_name, event_start, event_end FROM ind_calendar WHERE empCID='$currentID'";
$indResult = mysqli_query($link, $indCalSql);
// Employee's Personal Calendar Data
$indEvents = [];
while ($row = $indResult->fetch_assoc()) {
    $indEvents[] = [
        'title' => $row['event_name'],
        'start' => $row['event_start'],
        'end' => $row['event_end'],
        'color' => '#0d6efd'
    ];
}

$indEventsJson = json_encode($indEvents);
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
            events: <?php echo $indEventsJson; ?>,
        });
        calendar.render();
    });
</script>

<body>
    <h2 class="text-dark text-center p-3">Home</h2>
    <div class="container justify-content-center align-items-center" style="width: 80%">
        <div id="calendar" style="max-height: 550px;"></div>
    </div>
</body>
