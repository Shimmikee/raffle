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
                    <td>
						<form method="post">
						<?php
							require 'controller/config.php';
							$sql = "SELECT * FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
							$quer = mysqli_query($db,$sql);
							$row = mysqli_fetch_array($quer);
							if($row['monito_status'] == 0)
							{
								echo '<input style="padding: 10px;" type="submit" value="Click Me" name="btnClickme"/>';
							}
							else
							{
								echo 'PEN NAME : '.$row['monito_monita'];
							}
						?>
                        </form>
                    </td>
                        <?php monitoRaffle(); ?>
                    <th width="150" style="background-color: #EDC9AF;">Pen Name</th>
                    <th width="200" style="background-color: #EDC9AF; ">Wishlist</th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">1st Week</th>
                    <th></th>
                    <th rowspan="5"></th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">2nd Week</th>
                    <th></th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">3rd Week</th>
                    <th></th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">4th Week</th>
                    <th></th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">Bunutan 2018</th>
                    <th></th>
                </tr>
        </table>
        <form method="get">
        <input style="padding: 10px; margin: 20px auto; display: block;" type="submit" value="Logout" name="btnLogout"/>
        </form>
</body>
</html>
