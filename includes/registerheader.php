<?php
include_once('core/database.php');
?>

<!doctype html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<title>Draftpick</title>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	
	<body>
		<div id="topheader">
			<div id="topheadercenter">
				<a href="index.php" id="title">Draftpick</a>

				<?php

				if(!isset($_SESSION['id'])){

				$signs = '<nav class="signin">
							<ul>
								<li><a href="login.php">Sign in</a></li>
								<li><a href="register.php">Sign up</a></li>
							</ul>
						</nav>';
				echo $signs;

				} else {

				$signs = '<nav class="signin">
							<ul>
								<li><a href="logout.php">Log out</a></li>
							</ul>
						</nav>';
				echo $signs;

				}
				
				?>
				
				<div class="nav">
					<ul>
						<li><a href="#" class="navlink">Champions</a></li>
						<li><a href="#" class="navlink">Guides</a></li>
						<li><a href="#" class="navlink">Forums</a></li>
						<li><a href="#" class="navlink">Streams</a></li>
					</ul>
				</div>


			</div>

		</div>

		<div id="content">

