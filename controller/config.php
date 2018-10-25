<?php
    $db = mysqli_connect('172.16.39.241', 'administrator', 'Agsmc999','eraffle');
    if (!$db){
        trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
    }
?>