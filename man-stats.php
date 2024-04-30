<?php
include "./man-UI.php";

$sql = "SELECT skill_name, COUNT(*) as count FROM skills GROUP BY skill_name;";
$result = mysqli_query($link, $sql);

$skills = [];
$count = [];

while ($row = $result->fetch_assoc()) {
    $skills[] = $row['skill_name'];
    $count[] = $row['count'];
}

// Generate dynamic colour palette based on HSL
function genColors($numColors, $saturation = 80, $lightness = 50) {
    $colors = [];
    for ($i = 0; $i < $numColors; $i++) {
        $hue = ($i * 360 / $numColors) % 360;
        $colors[] = "hsl($hue, {$saturation}%, {$lightness}%)";
    }
    return $colors;
}

$colors = genColors(count($skills));
?>

<script>
    // Generate Pie chart showing skill distribution from database
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('skillChart').getContext('2d');
        var skillChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($skills); ?>,
                datasets: [{
                    label: 'Skill Count',
                    data: <?php echo json_encode($count); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                }
            }
        });
    });
</script>

<body>
    <h2 class="text-dark text-center p-3">Statistics - Skill Distribution</h2>
    <div class="container justify-content-center align-items-center" style="width: 38%; height: 38%">
        <canvas id="skillChart" width="500" height="500"></canvas>
    </div>
</body>
