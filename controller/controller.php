<?php

GLobal $idNumber;
    
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
                $loginQuery = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_status 
                FROM tbl_users WHERE userid = '$idNumber' AND user_status = '1' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($row = mysqli_fetch_array($loginSql))
                {
                    
                    $_SESSION['idNumber'] = $row['userid'];
                    //echo '<script type="text/javascript">window.alert('.$_SESSION['idNumber'].')</script>';
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

    function monitoRaffle()
    {
        require 'config.php';
        if(isset($_POST['btnMonito']))
        {
            $monito_status = 0;
            $monito_remark = "no";
            $sqlMonito_Status = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_status 
            FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
            $queryStatus = mysqli_query($db,$sqlMonito_Status);
            $rowStatus = mysqli_fetch_array($queryStatus);
            if($rowStatus['monito_status'] == $monito_status)
            {
                
                $Sql_shuffle = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_status 
                FROM tbl_users WHERE monito_remark = '$monito_remark' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND() ";
                $query_shuffle = mysqli_query($db,$Sql_shuffle);
                if($row_shuffle = mysqli_fetch_array($query_shuffle))
                {
                    echo '<td>PEN NAME : '.$row_shuffle['code_name'].'</td>';
                    echo '<td>WISHLIST : '.$row_shuffle['wishlist'].'</td>';
                    $updateMonito = mysqli_query($db,"UPDATE tbl_users SET monito_monita = '{$row_shuffle['code_name']}', monito_wishlist = '{$row_shuffle['wishlist']}', monito_status = '1' 
                    WHERE userid = '{$_SESSION['idNumber']}' ");
                    $updateMonito_remark = mysqli_query($db,"UPDATE tbl_users monito_remark = 'yes' WHERE userid = '{$row_shuffle['userid']}' ");
                }
                else
                {
                    echo '<script type="text/javascript">window.alert("ERROR IN QUERY");</script>';
                }
            }
            else
            {
                echo '<script type="text/javascript">window.alert("NAKABUNUTO KANA WAG KA PAULIT ULIT");</script>';
            }
        }

    }
?>