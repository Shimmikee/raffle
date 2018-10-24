<?php include 'controller/controller.php'; ?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="Style.css" media="screen" type="text/css" />	

</head>

<body>

	<div class="login-card">
		<h1>Christmas Celebration</h1>
		<h2>Register now!</h2>
	<?php eLogin(); ?>
	<form method="post">
		<input type="text" name="idNumber" placeholder="ID Number">
		<input type="text" name="penName" placeholder="Pen Name">
		<input type="text" name="wishList" placeholder="Wishlist">
		<input type="submit" name="login" class="login login-submit" value="Submit">
	</form>
</body>
</html>