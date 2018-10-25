<?php
    function eRegister()
    {
        require 'config.php';
        if(isset($_POST['login']))
        {
            $idNumber = $_POST['idNumber'];
            $penName = $_POST['penName'];
            $wishList = $_POST['wishList'];
            if(empty($idNumber) && empty($penName) && empty($wishList))
            {
                echo '<script type="text/javascript">window.alert("Please fill out all field")</script>';
            }
            else
            {
                $loginQuery = "INSERT INTO tbl_users(userid,pen_name,wishlist,status) VALUES('$idNumber','$penName','$wishList','0')";
                $loginSql = mysqli_query($db,$loginQuery);
                if($loginSql)
                {
                    echo '<script type="text/javascript">window.alert("Done")</script>';
                }
            }
                
        }
    }

    function checkID()
    {
        require 'config.php';
        if(isset($_POST['checkID']))
        {
            $idNumber = $_POST['idNumber'];
            if(empty($idNumber))
            {
                echo '<script type="text/javascript">window.alert("Please fill out all field")</script>';
            }
            else
            {
                $loginQuery = "SELECT * FROM tbl_users WHERE userid = '$idNumber' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($row = mysqli_fetch_array($loginSql))
                {
                    //echo '<script type="text/javascript">window.alert("TEST")</script>';
                    echo '<script src="../script.js"></script>';
                }else
                {
                    echo '<script type="text/javascript">window.alert("Invalid ID Number")</script>';
                }
            }   
        }
    }
?>