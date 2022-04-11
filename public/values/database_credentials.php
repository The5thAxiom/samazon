<?php
    $server_name = 'sql6.freemysqlhosting.net';
    $user_name = 'sql6484450';
    $user_password = '76FIzvkBGF';
    $db_name = 'sql6484450';

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