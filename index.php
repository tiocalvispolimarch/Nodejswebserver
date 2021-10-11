<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        }
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }
        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>
    <title>Datos CAN bus</title>
</head>
<body>
    <h1>Datos CAN bus tu padre 2021</h1>
    <form action="/excel.php">
        <label for="selectDay1">Date:</label>
        <input type="date" id="selectDay1" name="selectDay1">
        <input type="submit" value="Download">
    </form>
    <form action="/index.php">
        <label for="selectDay2">Date:</label>
        <input type="date" id="selectDay2" name="selectDay2">
        <input type="submit" value="Refresh">
    </form>
    <div id="chart_div"></div>
    <p></p>
    <table>
        <tr>
            <th>Date (GMT or Iceland Time)</th>
            <th>Reading</th>
        </tr>
        <?php
            $selectDay = 0;
            if (isset($_GET['selectDay2']) && $_GET['selectDay2']!="") {
                $selectDay=strtotime($_GET['selectDay2']);
            } else {
                $selectDay=time()-43200;
            }
            $nextDay = $selectDay+86400;
            $db = new PDO('sqlite:readingsDB.sqlite');
            $query = "SELECT * FROM readings Where date  BETWEEN " .$selectDay." AND ".$nextDay." ORDER BY date DESC";
            $result = $db->query($query);
            foreach($result as $row) {
                print "<tr><td>".date('d/m/Y H:i:s', $row['date'])."</td>";
                print "<td>".$row['distance']."</td></tr>";
            }
        ?>
    </table>
    <?php
        $query = "SELECT * FROM readings Where date  BETWEEN " .$selectDay." AND ".$nextDay." ORDER BY date ASC";
        $result = $db->query($query);
        $rows[][] = array();        
        $rows[0][0] = "Date";
        $rows[0][1] = "Sensor Readings";
        $count=1;
        foreach($result as $row) {
            $rows[$count][0] = date('H:i', $row['date']);
            $rows[$count][1] = intval($row["distance"]);
            $count++;
        }
        $jsonTable = json_encode($rows);
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["imagelinechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            let data = google.visualization.arrayToDataTable($jsonTable);
            let chart = new google.visualization.ImageLineChart(document.getElementById('chart_div'));
            let options = {'title':'Sensor Readings', 'showCategoryLabels':false, 'min':0};
            chart.draw(data, options);
        }
    </script>
</body>
</html>
