<?php
    $key = "";
    $distance = "0";
    if (isset($_POST['key'])) $key = $_POST['key'];
    if (isset($_POST['distance'])) $distance = $_POST['distance'];
    if ($key == "a@4K3") {
      $date = time();
      $intdistance = intval($distance);
      $db = new PDO('sqlite:readingsDB.sqlite');
      $db->exec("CREATE TABLE IF NOT EXISTS readings(date INTEGER, distance INTEGER)");
      $db->exec("INSERT INTO readings(date, distance) VALUES('$date','$intdistance');");
      echo "ok";
    }
?>