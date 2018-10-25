<?php
    function eLogin()
    {
        require 'config.php';
        if(isset($_POST['login']))
        {
            $idNumber = mysqli_real_escape_string($db,$_POST['idNumber']);
            $penName = mysqli_real_escape_string($db,$_POST['penName']);
            $wishList = mysqli_real_escape_string($db,$_POST['wishList']);
            $loginQuery = "INSERT INTO tbl_users(userid,pen_name,wishlist,status) VALUES('$idNumber','$penName','$wishList','0')";
            $loginSql = mysqli_query($db,$loginQuery);
            if($loginSql)
                echo '<script type="text/javascript">window.alert("DONE")</script>';
                header('Location:index.php');
                
        }
    }
?>