<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Domestic Abuse Victims and Survivors Project</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.html">Domestic Abuse Project</a></h1>
								<span></span>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.html">Welcome</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="experience.html">Share Your Experience</a></li>
									<li><a href="search.php">Search</a></li>
								</ul>
							</nav>

					</header>
				</div>


			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div id="content">

							<!-- Content -->
								<article>

									<h2>Search</h2>

									<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
									Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
									Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
									consequat etiam lorem ipsum dolor sit amet nullam.</p>

									<h3>Look Up Information</h3>
									<form action="#" method="post">
                                    <input id="search" type="text" placeholder="Key Words">
                                    <input id="submit" type="submit" value="Search">
                                    </form>

								</article>

						</div>
					</div>
				</div>

			</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>


<?php


$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "tA5aWsE5mKbC";
 $db = "test";

 $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

 if (!$conn) {
	echo "Connection failed here!";
	exit();}

	if (isset($_POST["submit"])){
		$str = $_POST["search"];
		$sth = $conn->prepare("SELECT * FROM 'search' WHERE (vJudgeName) OR (vPoliceofficer) OR (vLawyersname) = '$str' ");
		$sth->setFetchMode(PDO::FETCH_OBJ);
		$sth-> execute();

		if($row = $sth->fetch())
		{
			?>
			<br>
			<table>
				<tr>
					<th> Judge Name</th>
					<th> Police Officer</th>
					<th> Lawyer</th>
				</tr>
				<tr>
					<td><?php echo $row->vJudgeName; ?></td>
					<td><?php echo $row->vPoliceofficer; ?> </td>
					<td><?php echo $row->vLawyersname; ?> </td>
				</tr>



			<?php

	}
		else{
			echo "Does not exist";
		}


	}