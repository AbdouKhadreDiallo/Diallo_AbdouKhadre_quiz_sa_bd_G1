<?php

include('server.php');
$query = "SELECT * FROM utilisateurs";
$result = mysqli_query($conn, $query);
$rows = array();
while($r = mysqli_fetch_array($result)) {
    $rows[] = $r;
}
$rows =  json_encode($rows);
echo $rows;
