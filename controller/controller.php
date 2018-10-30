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
                $selCode_name = mysqli_query($db,"SELECT userid,code_name FROM tbl_users");
                $r = mysqli_fetch_array($selCode_name);
                if($r['code_name'] != $penName){
                    $loginQuery = "UPDATE tbl_users SET code_name = '$penName' , wishlist = '$wishList', user_status = '0' WHERE  userid = '$idNumber'  ";
                    $loginSql = mysqli_query($db,$loginQuery);
                    if($loginSql)
                    {
                        echo '<script type="text/javascript">window.alert("Done")</script>';
                    }
                }
                else
                {
                     echo '<script type="text/javascript">window.alert("BAGAL MO EH NAUNAHAN KA TULOY!")</script>';
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
                $loginQuery = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_remark,bunutan_status 
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
            $sqlMonito_Status = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_remark,bunutan_status 
            FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
            $queryStatus = mysqli_query($db,$sqlMonito_Status);
            $rowStatus = mysqli_fetch_array($queryStatus);
            if($rowStatus['monito_status'] == $monito_status)
            {
                
                $Sql_shuffle = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_remark,bunutan_status 
                FROM tbl_users WHERE monito_remark = '$monito_remark' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND() ";
                $query_shuffle = mysqli_query($db,$Sql_shuffle);
                if($row_shuffle = mysqli_fetch_array($query_shuffle))
                {
                    echo '<td>'.$row_shuffle['code_name'].'</td>';
                    echo '<td>'.$row_shuffle['wishlist'].'</td>';
                    $updateMonito = mysqli_query($db,"UPDATE tbl_users SET monito_monita = '{$row_shuffle['code_name']}', monito_wishlist = '{$row_shuffle['wishlist']}', monito_status = '1' 
                    WHERE userid = '{$_SESSION['idNumber']}' ");
                    $updateMonito_remark = mysqli_query($db,"UPDATE tbl_users SET monito_remark = 'yes' WHERE userid = '{$row_shuffle['userid']}' ");
                }
                else
                {
                    echo '<script type="text/javascript">window.alert("ERROR IN QUERY");</script>';
                }
            }
            else
            {
                echo '<script type="text/javascript">window.alert("Sarreh. One bunot only.");</script>';
            }
        }
    }

    function  bunutanRaffle()
    {
        require 'config.php';
        if(isset($_POST['btnBunutan']))
        {
            $bunutan_status = 0;
            $bunutan_remark = "no";
            $sqlBunutan_Status = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_remark,bunutan_status 
            FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
            $bunutan_query = mysqli_query($db,$sqlBunutan_Status);
            $rowBunutan = mysqli_fetch_array($bunutan_query);
            if($rowBunutan['bunutan_status'] == $bunutan_status)
            {
                $bunutan_Sql_shuffle = "SELECT userid,code_name,wishlist,user_status,monito_monita,monito_wishlist,monito_remark,monito_status,bunutan,bunutan_wishlist,bunutan_remark,bunutan_status 
                FROM tbl_users WHERE bunutan_remark = '$bunutan_remark' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND() ";
                $bunutan_query_shuffle = mysqli_query($db,$bunutan_Sql_shuffle);
                if($bunutan_row_shuffle = mysqli_fetch_array($bunutan_query_shuffle))
                {
                    echo '<td>'.$bunutan_row_shuffle['code_name'].'</td>';
                    echo '<td>'.$bunutan_row_shuffle['wishlist'].'</td>';
                    $updateBunutan = mysqli_query($db,"UPDATE tbl_users SET bunutan = '{$bunutan_row_shuffle['code_name']}', bunutan_wishlist = '{$bunutan_row_shuffle['wishlist']}', bunutan_status = '1' 
                    WHERE userid = '{$_SESSION['idNumber']}' ");
                    $updateBunutan_remark = mysqli_query($db,"UPDATE tbl_users SET bunutan_remark = 'yes' WHERE userid = '{$bunutan_row_shuffle['userid']}' ");
                }
                else
                {
                    echo '<script type="text/javascript">window.alert("ERROR IN QUERY");</script>';
                }
            }
            else
            {
                echo '<script type="text/javascript">window.alert("Sarreh. One bunot only.");</script>';
            }
        }
    }
?>