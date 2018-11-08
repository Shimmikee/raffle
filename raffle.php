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
                    <th width="150" style="background-color: #EDC9AF;"></th>
                    <th width="300" style="background-color: #EDC9AF; ">Category</th>
                    <th width="200" style="background-color: #EDC9AF;">Pen Name</th>
                </tr>
                <tr>
                <form method="post">
                    <th width="150" style="background-color: #EDC9AF;"><button style="padding: 15px;" name="btnMonito1">1st Week</button></th>
                </form>
                    <th style="font-size: 12px;">Something that makes a sound</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito1']))
                            {
                                monitoRaffle1();
                            }
                    ?>
                </tr>
                <tr>
                <form method="post">
                    <th width="150" style="background-color: #EDC9AF;"><button style="padding: 15px;" name="btnMonito2">2nd Week</button></th>
                </form>
                    <th style="font-size: 12px;">Something green</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito2']))
                            {
                                monitoRaffle2();
                            }
                    ?>
                </tr>
                <tr>
                <form method="post">
                    <th width="150" style="background-color: #EDC9AF;"><button style="padding: 15px;" name="btnMonito3">3rd Week</button></th>
                </form>
                    <th style="font-size: 12px;">Something reminiscent of childhood</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito3']))
                            {
                                monitoRaffle3();
                            }
                    ?>
                </tr>
                <tr>
                <form method="post">
                    <th width="150" style="background-color: #EDC9AF;"><button style="padding: 15px;" name="btnMonito4">4th Week</button></th>
                </form>
                    <th style="font-size: 12px;">Something unbreakable</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnMonito4']))
                            {
                                monitoRaffle4();
                            }
                    ?>
                </tr>
    </table>

        <!-- <form method="get">
            <button style="padding: 10px; margin: 20px auto; display: block;" name="btnResult">Show Results</button>
        </form>
        <?php
		    require 'controller/config.php';
            if(isset($_POST['btnResult']))
                {
                    showResults();
                }
        ?> -->
    
    <table align="center">
    
				<tr>
                    <form method="post">
                        <th width="150" style="background-color: #EDC9AF;"><button style="padding: 20px;" name="btnBunutan" disabled>Click Me Once</button></th>
                    </form>
                    <th width="200" height="70" style="background-color: #EDC9AF;">Pen Name</th>
                    <th width="300" height="70" style="background-color: #EDC9AF; ">Wishlist</th>
                </tr>
                <tr>
                    <th height="70" style="background-color: #EDC9AF; font-size: 15px;">Bunutan 2018</th>
                    <?php
		                require 'controller/config.php';
                         if(isset($_POST['btnBunutan']))
                            {
                                bunutanRaffle();
                            }
                    ?>
                </tr>
    </table>

    <table height="" align="center">
				<tr>
                    <th width="665" style="background-color: #EDC9AF;">Notes</th>
                </tr>
                <tr>
                    <th style="font-size: 12px;">
                        <p>Monito-Monita: Minimum of Php100.00<br/>
                        <p>Bunutan 2018: Minimum of Php500.00<br/>
                    </th>
                </tr>
    </table>

        <form method="get">
        <input style="padding: 10px; margin: 20px auto; display: block;" type="submit" value="Logout" name="btnLogout"/>
        </form>

</body>
</html>
