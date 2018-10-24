<?php
    function eLogin()
    {
        require 'config.php';
        if(isset($_POST['login']))
        {
            $idNumber = mysqli_real_escape_string($db,$_POST['idNumber']);
            $penName = mysqli_real_escape_string($db,$_POST['penName']);
            $loginSql = mysqli_query($db,"SELECT * FROM tbl_name WHERE userid = '$idNumber' AND pen_name = '$penName' ");
            if($loginSql)
                header('Location:raffle.html');
            else
                window.alert('Invalid userID / pen name');
                header('Location:index.php');
        }
    }
?>