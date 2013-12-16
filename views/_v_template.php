<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<!-- Header navigation -->
	<ul>

		<?php if($user): ?>
			<li><a href='/festivals/index'>EZFest</a></li>
			<li><a href='/friends/index'>Friends</a></li>
			<li><a href='/festivals/index/<?=$user->user_id?>'>My Festivals</a></li>
			<li><a href='/reg/logout'>Log Out</a></li>
		<?php else: ?>
			<li><a href='/'>EZFest</a></li>
			<li><a href='/reg/login'>Sign In</a></li>
			<li><a href='/reg/join'>Join</a></li>
		<?php endif; ?>
	</ul>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>