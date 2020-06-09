<?php
include('server.php');
include('select.php');
$result = mysqli_query($conn, $question);
$rows = array();
while($r = mysqli_fetch_array($result)) {
    $rows[] = $r;
}
$rows =  json_encode($rows);
echo $rows;
