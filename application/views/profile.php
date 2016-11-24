<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<h3>
		<p class="logout">Profile</p>
	</h3>
	<hr />
	<?php
	echo "<div class='text-center'><img width='8%' class='img-thumbnail' src=".$user_profile['icone']."/></div>";
	echo "<p>Nome: ".$user_profile['nome']."</p>";
	echo "<p>Sobrenome: ".$user_profile['sobrenome']."</p>";
	echo "<p>E-mail : ".$user_profile['email']."</p>";
	echo "<p>Perfil URL : "."<a href=".$user_profile['link']." target='_blank'"."> https://www.facebook.com/".$user_profile['id']."</a></p>";
	?>
</div>


