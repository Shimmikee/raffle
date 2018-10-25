<?php
    $db = mysqli_connect('172.16.31.39', 'administrator', 'Agsmc999','eraffle');
    if (!$db){
        trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
    }
?>