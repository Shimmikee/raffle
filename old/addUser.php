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
            $inserUser = "INSERT INTO tbl_users(userid,status) VALUES('$idNumber','0')";
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
    </form>
    <?php
        require 'controller/config.php';
        $sql = mysqli_query($db,"SELECT userid,pen_name,wishlist,status FROM tbl_users");
        echo '
             <table>
                <tr>
                    <th>ID NUMBER</th>
                </tr>
            ';
        while($row = mysqli_fetch_array($sql))
        {
            echo '
                    <tr>
                        <td>'.$row['userid'].'</td>
                    </tr>
            ';
        }
        echo '</table>';
    ?>
</body>
</html>