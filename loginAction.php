<?php
    require './db.php';

    // if (!$con) {
    //     die('Database Connection Error<br>'.mysqli_error());
    // }

    $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $actualPassword = mysqli_fetch_array(
        mysqli_query(
            $con,
            "
                SELECT
                    password
                FROM
                    PersonalDetails
                WHERE
                    PersonalDetails.email_id = '$email_id'
                ;
            "
        )
    )[0];

    if ($actualPassword == $password) echo readfile('customer.html');
    else echo 'Wrong Password';

    mysqli_close($con);
?>