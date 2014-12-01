<?php
session_start();
?>

<?php include_once('includes/registerheader.php'); ?>


	<?php

		if ($_POST){

			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$repeatpassword = $_POST['repeatpassword'];
			$email = $_POST['email'];

			$check = false;
			$required_fields = array('name', 'username', 'password', 'repeatpassword', 'email');
		
			foreach($_POST as $key=>$value){
				if(empty($value) && in_array($key, $required_fields)){
					$check = true;
					break 1;
				}
			}

			if ($check === true){
				$errormessage = 'All fields must be filled';
			} else {

				if (strlen($password) <= 6){
					$errors[] = 'Password must be over 6 characters';
				}
		//		
				if ($password != $repeatpassword) {
					$errors[] = "Your passwords doesn't match";
				}

				$usernametaken = mysql_query("SELECT id FROM users WHERE username='$username'");

				if (mysql_num_rows($usernametaken) > 0){
					$errors[] = 'That username is already taken';
				}

				$emailtaken = mysql_query("SELECT id FROM users WHERE email='$email'");

				if (mysql_num_rows($emailtaken) > 0){
					$errors[] = 'That email is already taken';
				}

				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$errors[] = 'Email is not valid';
				}

				if(!isset($errors)){
					$sql = "INSERT INTO users (name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";
					if(mysql_query($sql)){
						$success = 'Success!';
						header('location: login.php');
					}
				}
			}
		}

	?>


	<div id="loginarea">
		<div id="loginheader">
			<div id="headerhalf">
				<span id="logintitle">Register</span>
			</div>

			<form class="login" action="register.php" method="POST">
				<input type="text" name="name" placeholder="Full name">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="repeatpassword" placeholder="Repeat password">
				<input type="text" name="email" placeholder="Email">
				
				<?php 
					if (!empty($errors[0])){
						foreach($errors as $error){
							?><span class="errormessage"><?php
								echo $error;
							?></span><?php
						}
					}
				?>

				<input class="submit" type="submit" value="register">
			</form>

		</div>
	</div>

<?php include_once('includes/footer.php'); ?>