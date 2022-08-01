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
        <link rel="icon" href="images/favi.png">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Task', 'Types of Abuse'],
      <?php
          include 'connect.php';
		  $query = "SELECT * from test";
		  $results = mysqli_query($conn,$query);
		  while($data=mysqli_fetch_array($results)){
			echo "['".$data['vJudgesName']."', ".$data['id']."],";
		  }
		  ?>
	]);

	var options = {
	  title: 'Judges Reported',
	  pieHole: 0.4,
	};

	var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
	chart.draw(data, options);
  }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Tasks', 'Types'],
		<?php
          include 'connect.php';
		  $query = "SELECT * from test";
		  $results = mysqli_query($conn,$query);
		  while($data=mysqli_fetch_array($results)){
			echo "['".$data['vLawyersname']."', ".$data['id']."],";
		  }
		  ?>
	]);

	var options = {
		title: 'Lawyers Reported',
        pieHole: 0.1,
	  
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
  }
</script>


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
                                    <li><a href="dashboard.php">Dashboard</a></li>
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

									<h2>Dashboard</h2>

									<p> Welcome to the data dashboard. The dashboard displays non-sensitive information that have been submitted to our database by other users by using visual analytics. By collecting a vast amount data from users, we are able to display important statistics in the form of graphs for other users. These graphs are directly connected to our database providing a live and up to date visual as users submit data entry forms. </p>

								</article>	
                            
                                
						</div>	
					</div>
				</div>
			</div>

            <div>
			    <div id="stats" style="text-align: center;"><h3>Data Analytics</h3></div>
                    <section>
                        <article>
	
					            <div id="curve_chart" style="width: 500px; height: 300px; display: inline-block; "></div>
				
					            <div id="donutchart" style="width: 500px; height: 300px; display: inline-block; "></div>

								<div id="piechart" style="width: 500px; height: 300px; display: inline-block;"></div>
                        </article>
                    </section>
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