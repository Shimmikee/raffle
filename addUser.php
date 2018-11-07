<?php
    require 'controller/config.php';
    if(isset($_POST['add']))
    {
        $idNumber = mysqli_real_escape_string($db,$_POST['user']);
        $checkRow = mysqli_query($db,"SELECT userid FROM tbl_users WHERE userid = '$idNumber'");
        $rows = mysqli_fetch_array($checkRow);
        if(empty($idNumber))
        {
            echo '<script type="text/javascript">window.alert("Lagyan mo kaya ng LAMAN!")</script>';
        }
        elseif($rows>0)
        {
            echo '<script type="text/javascript">window.alert("MERON NA YAN WAG KA PAULIT-ULIT!")</script>';
        }
        else
        {
            $inserUser = "INSERT INTO tbl_users(userid,user_status,mon_remark1,mon_stats1,mon_remark2,mon_stats2,mon_remark3,mon_stats3,mon_remark4,mon_stats4,bunutan_remark,bunutan_status)
                        VALUES('$idNumber','0','no','0','no','0','no','0','no','0','no','0')";
            $quer = mysqli_query($db,$inserUser);
            echo '<script type="text/javascript">window.alert("AYIEEE PASOK NA!")</script>';
        }
    }

    if(isset($_POST['del']))
    {
        $idNumber = mysqli_real_escape_string($db,$_POST['user']);
        if(empty($idNumber))
        {
            echo '<script type="text/javascript">window.alert("Lagyan mo kaya ng LAMAN!")</script>';
        }
        else
        {
            $delUser = "DELETE FROM tbl_users WHERE userid = '$idNumber' ";
            $quer = mysqli_query($db,$delUser);
            echo '<script type="text/javascript">window.alert("PAG NADELETE NA WAG NA HANAPIN!")</script>';
        }
    }

    if(isset($_POST['ups']))
    {
            $delUser = "UPDATE tbl_users SET user_status = '1'";
            $quer = mysqli_query($db,$delUser);
            echo '<script type="text/javascript">window.alert("UPDATE NA LAHAT AYIEEE!")</script>';
    }

    if(isset($_POST['resets']))
    {
            $sdelUser = "UPDATE tbl_users SET user_status = '0' , code_name = '' , wishlist = '' , mon_stats1 = '0' , mon_stats2 = '0' , mon_stats3 = '0' , mon_stats4 = '0' ,
            mon_remark1 = 'no' ,mon_remark2 = 'no' ,mon_remark3 = 'no' ,mon_remark4 = 'no' ,bunutan = '' ,bunutan_wishlist = '' ,bunutan_remark = 'no' ,bunutan_status = '0'";
            $quer = mysqli_query($db,$sdelUser);
            echo '<script type="text/javascript">window.alert("UPDATE NA LAHAT AYIEEE!")</script>';
    }

    mysqli_close($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="addUser.php">
        <input type="text" name="user" id="" placeholder="user">
        <input type="submit" name="add" value="Add">
        <input type="submit" name="del" value="Delete">
        <input type="submit" name="ups" value="Update user status">
        <input type="submit" name="resets" value="RESET ALL">
    </form>
    <?php
        require 'controller/config.php';
        $sql = mysqli_query($db,"SELECT userid,code_name,wishlist,user_status,mon_stats1,mon_remark1,mon_stats2,mon_remark2,mon_stats3,mon_remark3,mon_stats4,mon_remark4,bunutan_status,bunutan_remark FROM tbl_users");
        echo '
             <table>
                <tr>
                    <th>ID NUMBER</th>
                    <th>USER STATUS</th>
                    <th>MONITO STATUS 1</th>
                    <th>MONITO REMARK 1</th>
                    <th>MONITO STATUS 2</th>
                    <th>MONITO REMARK 2</th>
                    <th>MONITO STATUS 3</th>
                    <th>MONITO REMARK 3</th>
                    <th>MONITO STATUS 4</th>
                    <th>MONITO REMARK 4</th>
                    <th>BUNUTAN STATUS</th>
                    <th>BUNUTAN REMARK</th>
                </tr>
            ';
        while($row = mysqli_fetch_array($sql))
        {
            echo '
                    <tr>
                        <td>'.$row['userid'].'</td>
                        <td>'.$row['user_status'].'</td>
                        <td>'.$row['mon_stats1'].'</td>
                        <td>'.$row['mon_remark1'].'</td>
                        <td>'.$row['mon_stats2'].'</td>
                        <td>'.$row['mon_remark2'].'</td>
                        <td>'.$row['mon_stats3'].'</td>
                        <td>'.$row['mon_remark3'].'</td>
                        <td>'.$row['mon_stats4'].'</td>
                        <td>'.$row['mon_remark4'].'</td>
                        <td>'.$row['bunutan_status'].'</td>
                        <td>'.$row['bunutan_remark'].'</td>
                    </tr>
            ';
        }
        echo '</table>';
    ?>
</body>
</html>