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
	<?php 
		eRegister(); 
	?>
	<form method="post">
		<input style="width: 210px;" type="text" name="idNumber" placeholder="ID Number">
		<input style="background-color: #C47451; width: 60px; height: 42px; margin-top: -53px; margin-left: 213px;" type="submit" name="checkID" class="login login-submit" value="Check">
		<div id="activate" style="display:none;">
			<input type="text" name="penName" placeholder="Pen Name" >
			<!-- <input type="text" name="wishList" placeholder="Wishlist"> -->
			<textarea style="resize:none; font-family: Verdana, sans-serif; padding: 6px; font-size: 16px;"  name="wishList" id="" cols="27" rows="10" placeholder="Wishlist (Ex. Item1, Item2, Item3...)"></textarea>
			<input type="submit" name="login" class="login login-submit" value="Submit"> 
		</div>
		<input type="submit" name="entryLogin" class="login login-entry" value="Login">
	</form>

	<?php
		require 'controller/config.php';
        if(isset($_POST['checkID']))
        {
            $idNumber = $_POST['idNumber'];
            if(empty($idNumber))
            {
                echo '<script type="text/javascript">window.alert("Please fill out all field")</script>';
            }
            else
            {
                $loginQuery = "SELECT * FROM tbl_users WHERE userid = '$idNumber' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($row = mysqli_fetch_array($loginSql))
                {
                    //echo '<script type="text/javascript">window.alert("TEST")</script>';
					echo '<script type="text/javascript">
						document.getElementById("activate").style.display = "block";
					</script>';
                }else
                {
                    echo '<script type="text/javascript">window.alert("Invalid ID Number")</script>';
                }
            }   
        }
	?>
</body>
</html>