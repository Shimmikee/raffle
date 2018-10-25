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
	<form method="post">
		<input style="width: 210px;" type="text" name="idNumber" placeholder="ID Number">
		<input style="background-color: #C47451; width: 60px; height: 42px; margin-top: -53px; margin-left: 213px;" type="submit" name="checkID" class="login login-submit" value="Check">
		<div id="activate">
			<input type="text" name="penName" placeholder="Pen Name" >
			<!-- <input type="text" name="wishList" placeholder="Wishlist"> -->
			<textarea style="resize:none; font-family: Verdana, sans-serif; padding: 6px; font-size: 16px;"  name="wishList" id="" cols="27" rows="10" placeholder="Wishlist (Ex. Item1, Item2, Item3...)"></textarea>
		</div>
		<input type="submit" name="login" class="login login-submit" value="Submit">
	</form>
	<?php eRegister(); checkID(); ?>
</body>
</html>