<!DOCTYPE html>
<html>

<head>

	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- Global CSS template -->
	<link rel="stylesheet" type="text/css" href="/css/_v_template.css">	

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<!-- Header navigation -->
	<ul>

		<?php if($user): ?>

			<li id='home_icon'><a href='/festivals/index'>EZFest</a></li>

			<li class='nav_icons'><a href='/reg/logout'>Log Out</a></li>

			<li class='nav_icons'>|</li>

			<li class='nav_icons'><a href='/friends/index'>Friends</a></li>

			<li class='nav_icons'>|</li>

			<li class='nav_icons'><a href='/festivals/index/<?=$user->user_id?>'>My Festivals</a></li>

			<li class='nav_icons'>|</li>

			<li class='nav_icons'><a href='/festivals/index'>All Festivals</a></li>

		<?php else: ?>

			<li id='home_icon'><a href='/'>EZFest</a></li>

			<li class='nav_icons'><a href='/reg/join'>Join</a></li>

			<li class='nav_icons'>|</li>

			<li class='nav_icons'><a href='/reg/login'>Sign In</a></li>

		<?php endif; ?>

		<!-- Empty div to clear floats -->
			<li><span id='empty_span'></span></li>

	</ul>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

</body>

</html>