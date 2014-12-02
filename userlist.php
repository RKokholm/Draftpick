<?php include_once('includes/header.php'); ?>

	
<ul>	

	<?php

		$query_users = mysql_query("SELECT id, username, rank FROM users");
	
		while ($row = mysql_fetch_assoc($query_users)){
			?><li class="list">
				<div class="username"><?=$row['username'];?></div>
				<div class="rank"><?=$row['rank'];?></div>
			</li><?php
		 }

	?>

</ul>

<?php include_once('includes/footer.php'); ?>