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

<div class="dropdown">
    <button class="dropbtn">Select Option</button>
    <div class="dropdown-content">
      <a href="#"><button onclick="myFunction()">Monito-Monita</button></a>
      <a href="#"><button onclick="myFunction()">Bunutan-2018</button></a>
    </div>
</div>

<div id="activate" style="display:none;">
<div class="raffleResult">
        <!-- <h1>Dito lalabas, lalabas lang to pag nagselect na ng option</h1> -->
        <?php

            require 'controller/config.php';
            $a = $_SESSION['idNumber'];
            echo '<script type="text/javascript">window.alert('.$S_SESSION['idNumber'].')</script>';
            $test = "";
            $Sql = "SELECT userid,pen_name,wishlist,status,remarks FROM tbl_users WHERE remarks = '$test'  ORDER BY RAND() ";
            $quer = mysqli_query($db,$Sql);
            if($row = mysqli_fetch_array($quer))
            {
                echo '<h1>'.$row['pen_name'].'</h1>';
                echo '<h1>'.$row['wishlist'].'</h1>';
                $upSQL = "UPDATE tbl_users SET remarks = '{$row['pen_name']}' WHERE pen_name = '{$row['pen_name']}' ";
                $quers = mysqli_query($db,$upSQL);
            }
        ?>
</div>
</div>

<script>
    function myFunction(){
        document.getElementById("activate").style.display = "block";
    }

</script>

</body>
</html>
