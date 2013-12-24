<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- JS/CSS File we want on every page -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>				
										
	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" href="/css/MyCss.css" type="text/css">
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
		
</head>

<body>	

	<nav>
		<menu>
				
			<!-- /Menu Item -->
			<!-- when logged in -->	
			<?php if($user): ?>
				<!-- When employee -->	
				<?php if($user->login_type == 1): ?>
					<li><a href='/users/profile'>Home</a></li>
					<li><a href='/employee/display'>Profile</a></li>
					<li><a href='/employee/searchemployer'>Search</a></li>
					<li><a href='/users/reset'>Change password</a></li>
					<li><a href='/users/logout'>Logout</a></li>
				<!-- When employer -->	
				<?php elseif($user->login_type == 2): ?>
					<li><a href='/users/profile'>Home</a></li>	
					<li><a href='/employer/display'>Profile</a></li>
					<li><a href='/employer/postJob'>Post Job</a></li>
					<li><a href='/employer/listMyJob'>List Job</a></li>
					<li><a href='/employer/searchemployee'>Search</a></li>
					<li><a href='/employer/appliedjob'>Applied Candidates</a></li>
					<li><a href='/users/reset'>Change password</a></li>
					<li><a href='/users/logout'>Logout</a></li>	
				<?php endif; ?>
			<!-- When not logged in -->
			<?php else: ?>
				<li><a href='/'>Home</a></li>
				<li><a href='/users/signup'>Sign Up</a></li>
				<li><a href='/users/login'>Log In</a></li>
			<?php endif; ?>
		</menu>
	</nav>
	
	<!-- When the uesr is Logged in display the Name -->
	<?php if($user): ?>
		Welcome <?=$user->first_name?> <br>
	<?php endif; ?>
	
		
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

	<script src="/js/FormValidation.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
</body>
</html>