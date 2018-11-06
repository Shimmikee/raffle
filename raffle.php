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
<html>
<body>

<div class ="backgroundBlock2"></div>
	<div class ="backgroundBlock1"></div>
<div class="titleBlock">
	<div class="headertitle">2018 CHRISTMAS CELEBRATION</div>
   

</div>

<img style="width:1000px;" src="eRaffle/border.png">

	<table height="300" align="center">
				<tr>
                <form method="post">
                    <th width="150" style="background-color: #EDC9AF;"><button style="padding: 20px;" name="btnMonito">Click Me</button></th>
                </form>
                    <th width="300" style="background-color: #EDC9AF; ">Category</th>
                    <th width="200" style="background-color: #EDC9AF;">Pen Name</th>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">1st Week</th>
                    <th>Something 1</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito']))
                            {
                                monitoRaffle();
                            }
                    ?>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">2nd Week</th>
                    <th>Something 2</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito']))
                            {
                                monitoRaffle();
                            }
                    ?>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">3rd Week</th>
                    <th>Something 3</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito']))
                            {
                                monitoRaffle();
                            }
                    ?>
                </tr>
                <tr>
                    <th width="150" style="background-color: #EDC9AF;">4th Week</th>
                    <th>Something 4</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito']))
                            {
                                monitoRaffle();
                            }
                    ?>
                </tr>
    </table>
    
    <table align="center">
    
				<tr>
                    <th></th>
                    <th width="200" height="50" style="background-color: #EDC9AF;">Pen Name</th>
                    <th width="300" height="50" style="background-color: #EDC9AF; ">Wishlist</th>
                </tr>
                <tr>
                    <th width="150" height="150" style="background-color: #EDC9AF;"><input style="padding: 20px;" type="submit" value="Bunutan 2018" name="btnBunutan"/></th>
                </tr>
    </table>

    <table height="" align="center">
				<tr>
                    <th width="665" style="background-color: #EDC9AF;">Notes</th>
                </tr>
                <tr>
                    <th style="font-size: 15px;">
                        <p>Monito-Monita: Minimum of Php100.00<br/>
                        <p>Bunutan 2018: Minimum of Php500.00</p>
                    </th>
                </tr>
    </table>

        <form method="get">
        <input style="padding: 10px; margin: 20px auto; display: block;" type="submit" value="Logout" name="btnLogout"/>
        </form>

</body>
</html>
