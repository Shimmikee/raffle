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

.raffleResult {
    display: block;
	padding: 10px;
    width: 270px;
    height: 150px;
	background-color: #EDC9AF;
	margin: auto;
	margin-top: 200px;
	overflow: hidden;
	opacity: 0.9;
}

.raffleResult h1 {
	font-weight: 100;
	text-align: center;
	font-size: 1.0em;
	color: #ffffff;
}

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
					<th style="background-color: #C47451;">SELECT OPTION</th>
					<th width="200" style="background-color: #C47451;">PEN NAME</th>
					<th width="400" style="background-color: #C47451;">WISHLIST</th>
				</tr>
				<tr>
					<td><button onclick="myFunction()">Monito-Monita</button></td>
					<td>
                        <script>
                        function myFunction() {
                        <?php
                            require 'controller/config.php';
                            $test = "";
                            $Sql = "SELECT * FROM tbl_users WHERE nabunot = '$test' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND()";
                            //echo '<script type="text/javascript">window.alert('.$_SESSION['idNumber'].')</script>';
                            $quer = mysqli_query($db,$Sql);
                            if($row = mysqli_fetch_array($quer))
                            {
                                echo '<h1>'.$row['pen_name'].'</h1>';
                                if($row['monito_status'] == '0')
                                {
                                    $upSQL = "UPDATE tbl_users SET nabunot = '{$row['pen_name']}' , hiling = '{$row['wishlist']}', monito_status = '1' WHERE userid = '{$_SESSION['idNumber']}' ";
                                    $quers = mysqli_query($db,$upSQL);
                                }
                                else
                                {
                                    echo '<h1>MAY NABUNOT KANA WAG KA PAULIT ULIT !</h1>';
                                }
                            }
                        ?>
                        }
                        </script>
                    </td>
					<td>
                        <script>
                        function myFunction() {
                        <?php
                            require 'controller/config.php';
                            $test = "";
                            $Sql = "SELECT * FROM tbl_users WHERE nabunot = '$test' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND()";
                            //echo '<script type="text/javascript">window.alert('.$_SESSION['idNumber'].')</script>';
                            $quer = mysqli_query($db,$Sql);
                            if($row = mysqli_fetch_array($quer))
                            {
                                echo '<h1>'.$row['wishlist'].'</h1>';
                                if($row['monito_status'] == '0')
                                {
                                    $upSQL = "UPDATE tbl_users SET nabunot = '{$row['pen_name']}' , hiling = '{$row['wishlist']}', monito_status = '1' WHERE userid = '{$_SESSION['idNumber']}' ";
                                    $quers = mysqli_query($db,$upSQL);
                                }
                                else
                                {
                                    echo '<h1>MAY NABUNOT KANA WAG KA PAULIT ULIT !</h1>';
                                }
                            }
                        ?>
                        }
                        </script>
                    </td>
				</tr>
				<tr>
					<td><button onclick="myFunction()">Bunutan-2018</button></td>
					<td></td>
					<td></td>
				</tr>
		</table>



<!-- <script>
    function myFunction(){
        document.getElementById("activate").style.display = "block";
    }

</script> -->

</body>
</html>
