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
		eLogin();
	?>
	<form method="post">
		<input style="width: 210px;" type="text" name="idNumber"  id="idNumber" placeholder="ID Number" pattern="[0-9]{7}">
		<input style="background-color: #C47451; width: 60px; height: 42px; margin-top: -53px; margin-left: 213px;" type="submit" name="checkID" class="login login-submit" id="reg" value="CHECK">
		<div id="activate" style="display:none;">
			<input type="text" name="penName" placeholder="Code Name" >
			<!-- <input type="text" name="wishList" placeholder="Wishlist"> -->
			<textarea style="resize:none; font-family: Verdana, sans-serif; padding: 6px; font-size: 16px;"  name="wishList" id="" cols="27" rows="10" placeholder="Wishlist (Ex. Item1, Item2, Item3...)"></textarea>
			<input type="submit" name="register" class="login login-submit" value="REGISTER"> 
		</div>
		<input type="submit" name="entryLogin" class="login login-entry" value="Login">
	</form>
	</div>

	<?php
		require 'controller/config.php';
        if(isset($_POST['checkID']))
        {
            $idNumber = mysqli_real_escape_string($db,$_POST['idNumber']);
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
					if($row['code_name'] == null || $row['code_name'] == '' && $row['wishlist'] == null || $row['wishlist'] == '')
					{
						echo '<script type="text/javascript">
							document.getElementById("idNumber").value = '.$row['userid'].';
							document.getElementById("idNumber").readOnly = true;
							document.getElementById("reg").style.display = "none";
						</script>';
						echo '<script type="text/javascript">
							document.getElementById("activate").style.display = "block";
						</script>';
					}
					else
					{
						echo '<script type="text/javascript">window.alert("Already Set your Code Name and Wishlist!")</script>';
					}
                }else
                {
                    echo '<script type="text/javascript">window.alert("Invalid ID Number")</script>';
                }
            }   
        }
	?>
</body>
</html>