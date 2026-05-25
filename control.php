<?php

$status = $_GET['status'];

// save to database
$conn = new mysqli("localhost", "root", "", "smart_door");

$conn->query("INSERT INTO door_status (status) VALUES ('$status')");

// send command to Arduino via serial file (Windows example COM3)
$port = fopen("COM3", "w");

if ($port) {
    fwrite($port, $status . "\n");
    fclose($port);
    echo "Command sent: $status";
} else {
    echo "Cannot open port";
}

?>