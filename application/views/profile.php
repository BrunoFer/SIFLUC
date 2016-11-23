
<div class="container">
	<h2>
	<?php
	echo "<a href=".$user_profile['link']." target='_blank' ><img class='fb_profile' src="."https://graph.facebook.com/".$user_profile['id']."/picture".">"."</a>"."<p class='profile_name'>Welcome ! <em>".$user_profile['name']."</em></p>";
	echo "<a class='logout' href='$logout_url'>Logout</a>";
	?>
	</h2>
	<hr />
	<h3>
		<u>Profile</u>
	</h3>
	<?php
	echo "<p>Nome: ".$user_profile['first_name']."</p>";
	echo "<p>Sobrenome: ".$user_profile['last_name']."</p>";
	echo "<p>Gênero : ".$user_profile['gender']."</p>";
	echo "<p>Facebook URL : "."<a href=".$user_profile['link']." target='_blank'"."> https://www.facebook.com/".$user_profile['id']."</a></p>";
	?>
</div>


