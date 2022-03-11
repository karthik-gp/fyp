<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<br>
	<br>
	<div class="header1">
	<h1 align="center" style="font-size: 50px">WELCOME TO ONLINE VOTING!!</h1></div>
	<div class="header">
		<h2>Register</h2>
	</div>
    <form method="post" action="register.php">
    	<?php include('errors.php'); ?>
    	<div class="input-group">
    		<label>Username</label>
    		<input type="text" name="username" value="<?php echo $username; ?>">
    	</div>
    	<div class="input-group">
    		<label>Email</label>
    		<input type="email" name="email" value="<?php echo $email; ?>">
    	</div>
    	<div class="input-group">
    		<label>Password</label>
    		<input type="password" name="password_1">
    	</div>
    	<div class="input-group">
    		<label>Confirm Password</label>
    		<input type="password" name="password_2">
    	</div>
    	<div class="input-group">
    		<button type="submit" class="btn" name="register">Register</button>
    	</div>
    	<p>
    		Already a member? <a href="login.php">Sign in</a>
    	</p>
    </form>

     
</body>
</html>