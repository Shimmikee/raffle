<?php
    
    function eRegister()
    {
        require 'config.php';
        if(isset($_POST['register']))
        {
            $idNumber = $_POST['idNumber'];
            $penName = $_POST['penName'];
            $wishList = $_POST['wishList'];
            if(empty($penName) && empty($wishList))
            {
                echo '<script type="text/javascript">window.alert("Please fill out all field")</script>';
            }
            else
            {
                $loginQuery = "UPDATE tbl_users SET pen_name = '$penName' , wishlist = '$wishList', status = '0' WHERE  userid = '$idNumber' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($loginSql)
                {
                    echo '<script type="text/javascript">window.alert("Done")</script>';
                }
            }
                
        }
        mysqli_close($db);
    }

    function eLogin()
    {
        session_start();
        require 'config.php';
        if(isset($_POST['entryLogin']))
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
                $loginQuery = "SELECT userid,pen_name,wishlist,status FROM tbl_users WHERE userid = '$idNumber' AND status = '1' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($row = mysqli_fetch_array($loginSql))
                {
                    
                    $_SESSION['idNumber'] = $row['userid'];
                    echo '<script type="text/javascript">window.alert('.$_SESSION['idNumber'].')</script>';
                    header("Location:raffle.php");
                    
                }
                else
                {
                    echo '<script type="text/javascript">window.alert("Account is inactive. Please register first.")</script>';
                }
            }
        }

        mysqli_close($db);
    }

    function randUser()
    {
        require 'config.php';

    }
?>