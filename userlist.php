<?php include_once('includes/header.php'); ?>

	<?php

		$query_users = mysql_query("SELECT * FROM users");
		
		 while ($row = mysql_fetch_assoc($query_users)){
		 	echo $username = $row['username'];
		 	echo $password = $row['password'];
		 	echo $rank = $row['rank'];
		 }



	?>

<?php include_once('includes/footer.php'); ?>