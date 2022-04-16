<?php
$servername = "ls-3ddf96afc758a0f6cdeaa24ce90edcf1d293a292.cdmnpinl6gyw.us-east-1.rds.amazonaws.com";
$username = "dbmasteruser";
$password = "VDG+}8WMuM+[KM5TBNEJyVN98hSJ1R)Z";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if($_SERVER['REQUEST_METHOD'] == "POST"){

  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>