<?php
    require '../static/database_connection.php';

    $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_fetch_array(
        mysqli_query(
            $con,
            "
                SELECT
                    password
                FROM
                    Accounts
                WHERE
                    Accounts.email_id = '$email_id'
                ;
            "
        )
    );
    if ($result) {
        $actualPassword = $result[0];
        if (password_verify($password, $actualPassword))
            echo "Welcome $email_id!";
        else echo 'Wrong Password';

    }
    else echo 'Wrong email';

    mysqli_close($con);
?>