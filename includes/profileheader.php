<?php

session_start();

include_once('core/database.php');

?>

<!doctype html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="css/profile.css">
		<title>Draftpick</title>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
	</head>
	
	<body>
		<div id="topheader">
			<div id="topheadercenter">
				<a href="index.php" id="title">Draftpick</a>

				<nav class="signin">
					<ul>

						<?php

						if (!isset($_SESSION['id'])){
							?>
								<li><a href="login.php">Sign in</a></li>
								<li><a href="register.php">Sign up</a></li>
							<?php 
						} else {
							?>
								<?php 
									$user = mysql_query("SELECT id, username FROM users WHERE id=".$_SESSION['id']);
									$userdata = mysql_fetch_assoc($user);
									$id = $userdata['id'];
									$username = $userdata['username'];
									
								?>

								<li><a href="logout.php">Log out</a></li>
								<li><a href="profile.php?pid=<?=$id;?>"><?=$username; ?></a></li>

							<?php							
						}
						
						?>

					</ul>
				</nav>
					
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

