<?php
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=Readings.xls');
?>
<table>
    <tr>
        <th>Date (GMT or Iceland Time)</th>
        <th>Readings</th>
    </tr>
    <?php
        $selectDay = 0;
        if (isset($_GET['selectDay1']) && $_GET['selectDay1']!="") {
            $selectDay = strtotime($_GET['selectDay1']);
        } else {
            $selectDay = time()-43200;
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