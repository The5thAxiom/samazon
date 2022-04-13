<?php
    // credentials for remote sql server
    $server_name = getenv('mysql_server_name');
    $user_name = getenv('user_name');
    $user_password = getenv('user_password');
    $db_name = getenv('db_name');

    // credentials for xampp server
    // $server_name = 'localhost';
    // $user_name = 'root';
    // $user_password = '';
    // $db_name = 'samazon_testing';

    // the connection to the database
    $con = mysqli_connect(
        $server_name,
        $user_name,
        $user_password,
        $db_name
    );
?>