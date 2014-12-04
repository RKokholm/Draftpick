<?php include_once('includes/profileheader.php') ?>


<?php
	
	$pid = $_GET['pid'];

?>

<div id="profilearea">
	<img class="profilepicture" src="graphics/unknown.jpg"></img>
	<div class="underline"></div>


		<?php
			$data = mysql_query("SELECT * FROM users WHERE id=$pid");
			$numrows = mysql_num_rows($data);
			

			if($numrows > 0){

			$row = mysql_fetch_assoc($data);
				
			$id = $row['id'];
			$rank = $row['rank'];
			$username = $row['username'];
			$password = $row['password'];
			$name = $row['name'];

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
		} else {
			header('location: noprofile.php');
		}
			

			?>
			<span class="user"><?=$username;?></span>
			<span class="rank"><?=getMyRank($rank);?></span>

			<div class="underline"></div>
			
			<?php

	if (isset($_SESSION['id']) && $_SESSION['id'] == $pid){

		?>
			<a class="editprofilelink" href="editprofile.php?pid=<?=$id;?>">
				<div class="editprofile">

					<div class="editprofilehalf">
					</div>

					<span>Edit Profile</span>
				</div>
			</a>

			<div class="underline"></div>
				
		<?php
	
	}

?>


<span class="guidesby">Latest guides:</span>

	<?php

		$query_guides = mysql_query("SELECT title, champion, date FROM champion_guides WHERE users_id=$id ORDER BY date DESC");

	?>

	<ul>
		<?php

			while ($row = mysql_fetch_assoc($query_guides)){

				$title = ucfirst($row['title']);
				$champion = $row['champion'];
				$date = $row['date'];

				?><li class="guides">

					<img src="graphics/threshsquare.png" class="champicon"></img>

					<div class="rightinfo">
						<div class="title"><?=$title;?></div>
						<div class="date"><?=$date;?></div>
					</div>

					<div class="clear"></div>

				</li><?php

			}

		?>
	</ul>


</div>



<div class="infoarea">

	<div class="about">
		<div class="sectionheader">
			<span>About</span>
		</div>
		<div class="abouttextarea">

			<?php

				$profile_data = mysql_query("SELECT id, profile_id, about FROM profiles WHERE profile_id=$pid");
				$fetch_data = mysql_fetch_assoc($profile_data);

				$about = $fetch_data['about'];

				echo nl2br($about);

			?>

		</div>

	</div>

	<div class="break"></div>

</div>


<?php include_once('includes/footer.php') ?>
