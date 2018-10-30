<?php
    require 'controller/config.php';
    if(isset($_POST['add']))
    {
        $idNumber = $_POST['user'];
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
            $inserUser = "INSERT INTO tbl_users(userid,user_status,monito_remark,monito_status,bunutan_remark,bunutan_status) VALUES('$idNumber','0','no','0','no','0')";
            $quer = mysqli_query($db,$inserUser);
            echo '<script type="text/javascript">window.alert("AYIEEE PASOK NA!")</script>';
        }
    }

    if(isset($_POST['del']))
    {
        $idNumber = $_POST['user'];
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
            $delUser = "UPDATE tbl_users SET user_status = '0' , code_name = '' , wishlist = '' , monito_monita = '' , monito_wishlist = '' , monito_status = '0' ,
            monito_remark = 'no' ,bunutan = '' ,bunutan_wishlist = '' ,bununtan_wishlist = '' ,bunutan_remark = 'no' ,bunutan_status = '0' ,";
            $quer = mysqli_query($db,$delUser);
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
        $sql = mysqli_query($db,"SELECT userid,code_name,wishlist,user_status,monito_status,monito_remark,bunutan_status,bunutan_remark FROM tbl_users");
        echo '
             <table>
                <tr>
                    <th>ID NUMBER</th>
                    <th>USER STATUS</th>
                    <th>MONITO STATUS</th>
                    <th>MONITO REMARK</th>
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
                        <td>'.$row['monito_status'].'</td>
                        <td>'.$row['monito_remark'].'</td>
                        <td>'.$row['bunutan_status'].'</td>
                        <td>'.$row['bunutan_remark'].'</td>
                    </tr>
            ';
        }
        echo '</table>';
    ?>
</body>
</html>