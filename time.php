<?php
// $d1= date("Y-m-d H:i:s");
$start_date = new DateTime(date("Y-m-d H:i:s"));
// echo date("Y-m-d H:i:s");
// echo $start_date;
$since_start = $start_date->diff(new DateTime(date("Y-m-d H:i:s")));

$minutes = $since_start->days * 24 * 60;
$minutes += $since_start->h * 60;
$minutes += $since_start->i;
echo $minutes.' minutes';
 ?>
