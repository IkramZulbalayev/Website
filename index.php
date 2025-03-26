<?php
include_once 'oop.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collatz Conjecture</title>
</head>
<body>
    <h2>Collatz Conjecture</h2>
    <form action="index.php" method="GET">
        <label for="start">Starting Number:</label>
        <input type="number" name="start" id="start" required value="<?php echo $startNumber; ?>"><br><br>
        
        <label for="last">Ending Number:</label>
        <input type="number" name="last" id="last" required value="<?php echo $lastNumber; ?>"><br><br>
        
        <input type="submit" value="Calculate">
    </form>

    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
window.onload = function () {

    // Fetch histogram data from PHP
    var histogramData = <?php echo json_encode($histogram); ?>;

    // Convert PHP histogram to CanvasJS data points
    var dataPoints = [];
    histogramData.forEach(function(item) {
        dataPoints.push({ x: item.num, y: item.iteration });
    });

    // Create the chart
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
            text: "Collatz Sequence Histogram"
        },
        axisY: {
            includeZero: true,
            title: "Frequency"
        },
        axisX: {
            title: "Collatz Numbers"
        },
        data: [{
            type: "column",
            indexLabelFontColor: "#5A5757",
            indexLabelFontSize: 12,
            indexLabelPlacement: "outside",
            dataPoints: dataPoints
        }]
    });

    chart.render();
}
</script>

</body>
</html>
