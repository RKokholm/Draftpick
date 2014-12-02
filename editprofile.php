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
	
	if (isset($_SESSION['id']) == $pid){

		?>
			<a class="editprofilelink" href="profile.php?pid=<?=$id;?>.">
				<div class="editprofile">

					<div class="editprofilehalf">
					</div>

					<span>Return to profile</span>
				</div>
			</a>
		<?php
	}

?>


</div>



<div class="infoarea">

	<div class="about">
		<div class="editprofiletitle">
			<span>Edit profile</span>
		</div>
		


		<?php

			$profile_data = mysql_query("SELECT id, profile_id, about FROM profiles WHERE profile_id=$pid");
			$fetch_data = mysql_fetch_assoc($profile_data);

			$about = $fetch_data['about'];

		?>

		<?php

			if(isset($_POST['aboutform'])){

				if(mysql_num_rows($profile_data) > 0){

				$aboutcontent = $_POST['about'];

				$sql = "UPDATE profiles SET profile_id=$pid, about='$aboutcontent' WHERE profile_id=$pid";
				mysql_query($sql);
				$saved = "Saved!";
				
				} else {

					$aboutcontent = $_POST['about'];

					$sql = "INSERT INTO profiles (profile_id, about) VALUES ($pid, '$aboutcontent')";
					mysql_query($sql);
					$saved = "Saved";

				}
			}

		?>



		<?php 

			if(isset($saved)){
				?><div class="saved"><?=$saved;?></div><?php
			}

		?>

		<span class="editabout">About</span>

		<form class="editprofileform" name="about" action="editprofile.php?pid=<?=$id;?>" method="POST">

			<textarea rows="15" cols="80" name="about" maxlength="1500"><?=$about;?></textarea>
			<input type="submit" name="aboutform" value="Save"></input>

		</form>

	</div>

</div>


<?php include_once('includes/footer.php') ?>
