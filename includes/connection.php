<?php
$databaseServer= "localhost";
$databaseUserName = "root";
$databasePassword = "root";
$databaseName = "Gers_garage";

// Create connection
$conn = mysqli_connect($databaseServer, $databaseUserName, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
