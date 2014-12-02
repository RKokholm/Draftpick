<?php
session_start();
?>

<?php include_once('includes/loginheader.php'); ?>

	<?php

		if ($_POST){

			$username = $_POST["username"];
			$password = $_POST["password"];

			if ($username&&$password) {

				$query = mysql_query("SELECT id, username, password, email, rank FROM users WHERE username='$username' and password='$password'");
				$numrows = mysql_num_rows($query);


				if ($numrows==1) {
					$row = mysql_fetch_assoc($query);
					$_SESSION['id'] = $row['id'];
					$_SESSION['rank'] = $row['rank'];
					header('location: index.php');

				} else {
					$errors[] = '<span class="error">User does not exist</span>';
				}

			} else {
				$errors[]= '<span class="error">Please fill both username and password</span>';
			}
		}

	?>


	<div id="loginarea">
		<div id="loginheader">
			<div id="headerhalf">
				<span id="logintitle">Sign in</span>
			</div>
		</div>

		<form class="login" action="login.php" method="POST">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<?php 

			if (isset($errors)){
				foreach($errors as $error){
					echo $error;
				}
			}

			?>
			<input class="submit" type="submit" value="Log in">
		</form>

	</div>

<?php include_once('includes/footer.php'); ?>