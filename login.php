<?php
    /*
    The php for entering the registration form into the 
    samazon_users mysql db
    */
    $server_name = 'localhost';
    $user_name = 'root';
    $user_password = '';
    $db_name = 'samazon_users';
    $con = mysqli_connect($server_name, $user_name, $user_password, $db_name);

    if (!$con) {
        die('Database Connection Error<br>'.mysqli_error());
    }

    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM PersonalDetails WHERE PersonalDetails.email_id = '$email_id';";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if ($row[0] == $password){
        echo readfile('customer.html');
    } else {
        echo 'Wrong Password';
    }

?>