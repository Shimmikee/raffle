<?php
    include 'controller/controller.php';
    elogin();
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
                        <h1>MONITO - MONITA</h1>
                    </td>
                        <?php checkMonito(); ?>
				</tr>
				<tr>
					<td>
                        <h1>BUNUTAN</h1>
                    </td>
                        <?php bunutanRaffle(); ?>
				</tr>
		</table>
</body>
</html>
