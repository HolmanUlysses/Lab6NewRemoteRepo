<?php
    $servername = 'localhost';
    $username = 'ts_user';
    $password = 'pa55word';
    $dbname = 'tech_support';

    $datab = new mysqli($servername, $username, $password, $dbname);
    
    if(mysqli_connect_error())
    {
        echo '<p>Error';
        include('database_error.php');
        exit();
    }
?>