<?php
    $db = mysqli_connect('172.16.31.39', 'jm', 'jmagumboy28','eraffle');
    if (!$db){
        trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
    }
?>