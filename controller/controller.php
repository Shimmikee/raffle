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
                $loginQuery = "UPDATE tbl_users SET pen_name = '$penName' , whislist = '$wishList', status = '0' WHERE  userid = '$idNumber' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($loginSql)
                {
                    echo '<script type="text/javascript">window.alert("Done")</script>';
                }
            }
                
        }
    }
?>