<?php
    function eLogin()
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
                header('Location:index.php');
            }
            else
            {
                $loginQuery = "INSERT INTO tbl_users(userid,pen_name,wishlist,status) VALUES('$idNumber','$penName','$wishList','0')";
                $loginSql = mysqli_query($db,$loginQuery);
                if($loginSql)
                {
                    echo '<script type="text/javascript">
                            var x = document.getElementById("activate");
                            if(x.style.display == "none")
                            {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                    </script>';
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
                $loginQuery = "SELECT userid,pen_name,wishlist,status FROM tbl_users WHERE userid = '$idNumber' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($loginSql)
                {
                    echo '<script type="text/javascript">
                            var x = document.getElementById("activate");
                            if(x.style.display == "none")
                            {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                    </script>';
                }else
                {
                    echo '<script type="text/javascript">window.alert("Invalid ID Number")</script>';
                }
            }   
        }
    }
?>