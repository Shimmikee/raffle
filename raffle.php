<?php
    include 'controller/controller.php';
    elogin();
    eLogout();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css" media="screen" type="text/css" />
<style>

</style>    
</head>     

<body>
  
<div class ="backgroundBlock2"></div>
	<div class ="backgroundBlock1"></div>
<div class="titleBlock">
	<div class="headertitle">2018 CHRISTMAS CELEBRATION</div>
</div>

<img style="width:1000px;" src="eRaffle/border.png">

	<table height="400" align="center">
				<tr>
					<th style="background-color: #EDC9AF;"></th>
					<th width="150" style="background-color: #EDC9AF;">PEN NAME</th>
					<th width="300" style="background-color: #EDC9AF;">WISHLIST</th>
				</tr>
				<tr>
					<td>
						<form method="post">
						<?php
							require 'controller/config.php';
							$sql = "SELECT * FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
							$quer = mysqli_query($db,$sql);
							$row = mysqli_fetch_array($quer);
							if($row['monito_status'] == 0)
							{
								echo '<input style="padding: 10px;" type="submit" value="Monito - Monita" name="btnMonito"/>';
							}
							else
							{
								echo 'PEN NAME : '.$row['monito_monita'];
							}
						?>
                        </form>
                    </td>
                        <?php monitoRaffle(); ?>
				</tr>
				<tr>
					<td>
						<form method="post">
							<?php
								require 'controller/config.php';
								$sql = "SELECT * FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
								$quer = mysqli_query($db,$sql);
								$row = mysqli_fetch_array($quer);
								if($row['bunutan_status'] == 0)
								{
									echo '<input style="padding: 10px;" type="submit" value="Bunutan 2018" name="btnBunutan" disabled/>';
								}
								else
								{
									echo 'PEN NAME : '.$row['bunutan'];
									echo 'WISHLIST : '.$row['bunutan_wishlist'];
								}
							?>
                        </form>
                    </td>
                        <?php bunutanRaffle(); ?>
				</tr>
        </table>
        <form method="get">
        <input style="padding: 10px; margin: 20px auto; display: block;" type="submit" value="Logout" name="btnLogout"/>
        </form>
</body>
</html>
