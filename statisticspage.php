<!DOCTYPE html>
<html>
<head>
    <title>Motorcycle Accessory Sales</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
    <h1>Motorcycle Accessory Sales</h1>
    <div id="accessoryChart"></div>

    <script>
        // Sample data (replace with your actual data)
        var accessories = ["Helmets", "Jackets", "Gloves", "GoPro Cameras", "Handlebar Locks"];
        var sales = [250, 120, 180, 90, 60];

        // Create a pie chart using Plotly
        var data = [{
            labels: accessories,
            values: sales,
            type: 'pie'
        }];

        var layout = {
            title: 'Motorcycle Accessory Sales'
        };

        Plotly.newPlot('accessoryChart', data, layout);
    </script>
</body>
</html>
