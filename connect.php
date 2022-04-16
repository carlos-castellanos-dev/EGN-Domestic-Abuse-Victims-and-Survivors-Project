
<?php  

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "tA5aWsE5mKbC";
 $db = "test";

 $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

 if (!$conn) {
	echo "Connection failed here!";
	exit();
}
?>
