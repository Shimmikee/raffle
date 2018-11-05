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
                        <?php jemina(); ?>
						<form method="post">
						<?php
							// require 'controller/config.php';
							// //$sql = "SELECT * FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
							// $quer = mysqli_query($db,$sql);
							// $row = mysqli_fetch_array($quer);
							// if($row['monito_status'] == 0)
							// {
							// 	echo '<input style="padding: 10px;" type="submit" value="Click Me" name="btnClickme"/>';
							// }
							// else
							// {
							// 	echo 'Done'.$row['monito_monita'];
							// }
						?>
                        </form>
                    </td>
                    <th width="150" style="background-color: #EDC9AF; ">Gift Worth</th>
                    <th width="150" style="background-color: #EDC9AF;">Pen Name</th>
                    <th width="200" style="background-color: #EDC9AF; ">Wishlist</th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">1st Week</th>
                    <th rowspan="5">
                        <p>Monito-Monita:<br/>
                        <p>Minimum of Php100.00<br/>
                        <p>Bunutan 2018 :<br/>
                        <p>Minimum of Php500.00</p>
                    </th>
                    <?php echo '<th>MIKEE KO</th>'; echo '<th>MIKEE KO2</th>'; //monitoRaffle();  ?>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">2nd Week</th>
                    <th style="border: 2px solid #ffffff;"></th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">3rd Week</th>
                    <th style="border: 2px solid #ffffff;"></th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">4th Week</th>
                    <th style="border: 2px solid #ffffff;"></th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">Bunutan 2018</th>
                    <th style="border: 2px solid #ffffff;"></th>
                </tr>
        </table>
        <form method="get">
        <input style="padding: 10px; margin: 20px auto; display: block;" type="submit" value="Logout" name="btnLogout"/>
        </form>

        
        <h1>Countdown Clock</h1>
<div id="clockdiv">
  <div>
    <span class="days"></span>
    <div class="smalltext">Days</div>
  </div>
  <div>
    <span class="hours"></span>
    <div class="smalltext">Hours</div>
  </div>
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>




</body>
</html>
