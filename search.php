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

									<h2>Search</h2>

									<p>Use this page to search our database of reported court officials </p>

									<h3>Look Up Information</h3>
									<form action="" method="GET">
                                    <input type="text" required name="search" 
                                        value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Key Word">
                                    <input type="submit">
									
                                    </form>

								</article>
								<div class="container">
                                 <div class="card mt-4"> 
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Judge Name</th>
                                                    
													<th> Lawyer Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include "connect.php";

                                                    if(isset($_GET['search']))
                                                    {
                                                        $names = $_GET['search'];
                                                        $query = "SELECT * FROM test WHERE vJudgesName LIKE '%$names%' ";
                                                        $query_run = mysqli_query($conn, $query);

                                                        if(mysqli_num_rows($query_run) > 0)
                                                        {
                                                            foreach($query_run as $items)
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td><?= $items['vJudgesName']; ?></td>
                                                                    
																	<td><?= $items['vLawyersname']; ?> </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td colspan="2">No Files Found</td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
												</div>

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

