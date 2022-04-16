<?php  
if (isset($_POST['vfirstName']) && isset($_POST['vlastName'])) {
	include 'connect.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$vfirstName = validate($_POST['vfirstName']);
	$vlastName = validate($_POST['vlastName']);

	if (empty($vlastName) || empty($vfirstName)) {
		header("Location: experience.html");
	}else {

		$sql = "INSERT INTO test(vfirstName, vlastName) VALUES('$vfirstName', '$vlastName')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
		}else {
			echo "Your message could not be sent!";
		}
	}

}else {
	header("Location: index.html");
}
