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
			<span class="username"><?=$username;?></span>
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
		<?php
	
	}

?>

</div>



<div class="infoarea">

	<div class="about">
		<div class="sectionheader">
			<span>About <span><?=$username?></span></span>
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

</div>


<?php include_once('includes/footer.php') ?>
