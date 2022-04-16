<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "test";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>

<?php  

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "test";

 $conn = mysqli_connect($sname, $uname, $password, $db_name);

 if (!$conn) {
	echo "Connection failed!";
	exit();
}

