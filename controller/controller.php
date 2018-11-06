<?php
// error_reporting(0);
GLobal $idNumber;
    
    function eRegister()
    {
        require 'config.php';
        if(isset($_POST['register']))
        {
            $idNumber = mysqli_real_escape_string($db,$_POST['idNumber']);
            $penName = mysqli_real_escape_string($db,$_POST['penName']);
            $wishList = mysqli_real_escape_string($db,$_POST['wishList']);
            if(empty($idNumber) || $idNumber == null || $idNumber == '')
            {
                echo '<script type="text/javascript">window.alert("ID MO HUY")</script>';
            }
            if(empty($penName) || $penName == null || $penName == '')
            {
                echo '<script type="text/javascript">window.alert("PEN NAME MO HUY")</script>';
            }
            if(empty($wishList) || $wishList == null || $wishList == '')
            {
                echo '<script type="text/javascript">window.alert("WISHLIST NAHIYA KAPA EH")</script>';
            }
            else
            {
                $selCode_name = mysqli_query($db,"SELECT * FROM tbl_users WHERE code_name = '$penName' ");
                if($r = mysqli_fetch_array($selCode_name))
                {
                    echo '<script type="text/javascript">window.alert("BAGAL MO EH NAUNAHAN KA TULOY!")</script>'; 
                }
                else
                {
                    $loginQuery = "UPDATE tbl_users SET code_name = '$penName' , wishlist = '$wishList', user_status = '0' WHERE  userid = '$idNumber'  ";
                    $loginSql = mysqli_query($db,$loginQuery);
                    if($loginSql)
                    {
                        echo '<script type="text/javascript">window.alert("Done")</script>';
                    }  
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
            $idNumber = mysqli_real_escape_string($db,$_POST['idNumber']);
            $penName = mysqli_real_escape_string($db,$_POST['penName']);
            $wishList = mysqli_real_escape_string($db,$_POST['wishList']);
            if(empty($idNumber) && empty($penName) && empty($wishList))
            {
                echo '<script type="text/javascript">window.alert("Please fill out all field")</script>';
            }
            elseif($idNumber == " " && $penName == " " && $wishList == " ")
            {
                echo '<script type="text/javascript">window.alert("Please fill out all field")</script>';
            }
            else
            {
                $loginQuery = "SELECT * FROM tbl_users WHERE userid = '$idNumber' AND user_status = '1' ";
                $loginSql = mysqli_query($db,$loginQuery);
                if($row = mysqli_fetch_array($loginSql))
                {
                    
                    $_SESSION['idNumber'] = $row['userid'];
                    //echo '<script type="text/javascript">window.alert('.$_SESSION['idNumber'].')</script>';
                    header("Location:raffle.php");
                    
                }
                else
                {
                    echo '<script type="text/javascript">window.alert("Account is inactive.")</script>';
                }
            }
        }

        mysqli_close($db);
    }

    function monitoRaffle()
    {
        require 'config.php';
        

            $monito_status1 = 0;
            $monito_status2 = 0;
            $monito_status3 = 0;
            $monito_status4 = 0;
            $monito_remark1 = "no";
            $monito_remark2 = "no";
            $monito_remark3 = "no";
            $monito_remark4 = "no";

            $sqlMonito_Status = "SELECT * FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
            $queryStatus = mysqli_query($db,$sqlMonito_Status);
            $rowStatus = mysqli_fetch_array($queryStatus);

            //FIRST WEEK

            if(($rowStatus['monito_status1'] == 0) && ($rowStatus['monito_status2'] == 0) && ($rowStatus['monito_status3'] == 0) && ($rowStatus['monito_status4'] == 0))
            {
                
                $Sql_shuffle = "SELECT * FROM tbl_users WHERE monito_remark1 = '$monito_remark1' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND() ";
                $query_shuffle = mysqli_query($db,$Sql_shuffle);
                if($row_shuffle = mysqli_fetch_array($query_shuffle))
                {
                    echo '<th>'.$row_shuffle['code_name'].'</th>';
                    $updateMonito = mysqli_query($db,"UPDATE tbl_users SET monito_monita1 = '{$row_shuffle['code_name']}', monito_status1 = '1'
                    WHERE userid = '{$_SESSION['idNumber']}' ");
                    $updateMonito_remark = mysqli_query($db,"UPDATE tbl_users SET monito_remark1 = 'yes' WHERE userid = '{$row_shuffle['userid']}' ");
                }
                else
                {
                    echo '<script type="text/javascript">window.alert("ERROR IN QUERY");</script>';
                }
            }

            //SECOND WEEK

            // if(($rowStatus['monito_status1'] == 0) && ($rowStatus['monito_status2'] == 0) && ($rowStatus['monito_status3'] == 0) && ($rowStatus['monito_status4'] == 0))
            // {
                
            //     $Sql_shuffle = "SELECT * FROM tbl_users WHERE monito_remark2 = '$monito_remark2' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND() ";
            //     $query_shuffle = mysqli_query($db,$Sql_shuffle);
            //     if($row_shuffle = mysqli_fetch_array($query_shuffle))
            //     {
            //         echo '<th>'.$row_shuffle['code_name'].'</th>';
            //         $updateMonito = mysqli_query($db,"UPDATE tbl_users SET monito_monita2 = '{$row_shuffle['code_name']}', monito_status2 = '1'
            //         WHERE userid = '{$_SESSION['idNumber']}' ");
            //         $updateMonito_remark = mysqli_query($db,"UPDATE tbl_users SET monito_remark2 = 'yes' WHERE userid = '{$row_shuffle['userid']}' ");
            //     }
            //     else
            //     {
            //         echo '<script type="text/javascript">window.alert("ERROR IN QUERY");</script>';
            //     }
            // }



            else
            {
                echo '<script type="text/javascript">window.alert("Sarreh. One bunot only.");</script>';
            }
        
    }

    function  bunutanRaffle()
    {
            require 'config.php';
            
                $bunutan_status = 0;
                $bunutan_remark = "no";
                $sqlBunutan_Status = "SELECT * FROM tbl_users WHERE userid = '{$_SESSION['idNumber']}' ";
                $bunutan_query = mysqli_query($db,$sqlBunutan_Status);
                $rowBunutan = mysqli_fetch_array($bunutan_query);
                if($rowBunutan['bunutan_status'] == $bunutan_status)
                {
                    $bunutan_Sql_shuffle = "SELECT * FROM tbl_users WHERE bunutan_remark = '$bunutan_remark' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND() ";
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

        echo 'test';
        
    }

    function checkMonito()
    {
        require 'config.php';
    }

    function eLogout()
    {
        require 'config.php';
        if(isset($_GET['btnLogout']))
        {
            echo '<script type="text/javascript">window.alert("Sarreh. One bunot only.");</script>';
            session_destroy();
            session_unset();
            header('location:index.php');
        }
        mysqli_close($db);
    }

//     function monito()

//     {
//     function jemina()
// {
//     require 'config.php';
//     if(isset($_POST['btnClickme']))
//          {
//              $count = 0;
//              while($count <= 5)
             
//                  monitoRaffle();
//                  if($count == 5)
//                  {
//                      bunutanRaffle();
//                      $count = 5;
//                  }
//                  $count++;
//              }
//              if($count == 5)
//              {
//                  echo '<script type="text/javascript">window.alert("Done.");</script>';
//              }


//             //'btnClickme = 1stweek,2nd week,3rd week and 4th week 
//             //btn $bunutan_Sql_shuffle = "SELECT userid,code_name,user_status,monito_monita,monito_wishlist,monito_status,bunutan,bunutan_wishlist,bunutan_remark,bunutan_status 
//            // FROM tbl_users WHERE bunutan_remark = '$bunutan_remark' AND userid != '{$_SESSION['idNumber']}' ORDER BY RAND() ";
        
        
//         //}
//     }
?>