<?php
include "./emp-UI.php";
?>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay',
                center: 'title',
                right: 'prev,next today',
            },
            events: <?php echo $allEventsJson; ?>,
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
