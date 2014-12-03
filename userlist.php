<?php include_once('includes/header.php'); ?>

	<div class="userlist_titles">
		<div class="userlist_title"><span>Username</span></div>
		<div class="userlist_title"><span>Unknown</span></div>
		<div class="userlist_title"><span>Rank Status</span></div>
	</div>

<ul id="userlist">	

	<?php

		$query_users = mysql_query("SELECT id, username, rank FROM users");

			function getMyRank($rank) {
				switch ($rank) {
					case '1':
						return 'Advanced Member';
						break;

					case '2':
						return 'Moderator';
						break;

					case '3':
						return 'Administrator';
						break;
					
					default:
						return 'Basic Member';
						break;
				}
			}

		$i = 0;
	
		while ($row = mysql_fetch_assoc($query_users)){

			if ($i == 1) {
				$i = 0;
			} else {
				$i++;
			}
			
			$rank = $row['rank'];
			$id = $row['id'];

			?><li class="list <?php if($i == 1) echo "style"; ?>">
				<div class="username"><a href="profile.php?pid=<?=$id;?>"><?=$row['username'];?></a></div>
				<div class="unknown">HHEEEEEEJ</div>
				<div class="rank"><?=getMyRank($rank)?></div>
			</li><?php
		 }

	?>

</ul>

<?php include_once('includes/footer.php'); ?>