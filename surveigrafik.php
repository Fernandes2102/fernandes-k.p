<?php
include 'surveidb.php';
$data = $conn->query("SELECT pilihan, COUNT(*) as jumlah FROM survei GROUP BY pilihan");

$labels = [];
$values = [];
while ($row = $data->fetch_assoc()) {
    $labels[] = $row['pilihan'];
    $values[] = $row['jumlah'];
}
?>
<canvas id="chart" width="400" height="200"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Hasil Survei',
            data: <?= json_encode($values) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    }
});
</script>
