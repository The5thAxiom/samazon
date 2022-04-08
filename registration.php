<?php
    /*
    The php for entering the registration form into the 
    samazon_users mysql db
    */
    $server_name = 'sql6.freemysqlhosting.net';
    $user_name = 'sql6484450';
    $user_password = '76FIzvkBGF';
    $db_name = 'sql6484450';
    $con = mysqli_connect($server_name, $user_name, $user_password, $db_name);

    // PersonalDetails Table
    $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
    $country_code = mysqli_real_escape_string($con, $_POST['country_code']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    if ($middle_name == '') $middle_name = 'NULL';
    else $middle_name = "'$middle_name'";
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    //Address table
    $house = mysqli_real_escape_string($con, $_POST['house']);
    $street_name = mysqli_real_escape_string($con, $_POST['street_name']);
    if ($street_name == '') $street_name = 'NULL';
    else $street_name == "'$street_name'";
    $locality = mysqli_real_escape_string($con, $_POST['locality']);
    if ($locality == '') $locality = 'NULL';
    else $locality == "'$locality'";
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $pin_code = mysqli_real_escape_string($con, $_POST['pin_code']);
    $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);

    // CardDetails
    $card_no = mysqli_real_escape_string($con, $_POST['card_no']);
    $expiry_month = mysqli_real_escape_string($con, $_POST['expiry_month']);
    $expiry_year = mysqli_real_escape_string($con, $_POST['expiry_year']);
    $name_as_on_card = mysqli_real_escape_string($con, $_POST['name_as_on_card']);

    $insert_personal = "
    INSERT 
        INTO PersonalDetails (
            email_id,
            country_code,
            phone_no,
            first_name,
            middle_name,
            last_name,
            date_of_birth,
            gender,
            password
        )
        VALUES (
            '$email_id',
            $country_code,
            $phone_no,
            '$first_name',
            $middle_name,
            '$last_name',
            '$date_of_birth',
            '$gender',
            '$password'
        );
    ";

    $insert_address = "
    INSERT
        INTO Address (
            email_id,
            house,
            street_name,
            locality,
            city,
            state,
            pin_code,
            contact_no
        )
        VALUES (
            '$email_id',
            '$house',
            $street_name,
            $locality,
            '$city',
            '$state',
            $pin_code,
            $contact_no
        );
    ";

    $insert_card = "
    INSERT
        INTO CardDetails (
            email_id,
            card_no,
            expiry_month,
            expiry_year,
            name_as_on_card
        )
        VALUES (
            '$email_id',
            $card_no,
            $expiry_month,
            $expiry_year,
            '$name_as_on_card'
        );
    ";

    $insert_personal_result = mysqli_query($con, $insert_personal);
    $insert_address_result = mysqli_query($con, $insert_address);
    $insert_card_result = mysqli_query($con, $insert_card);

    if ($insert_personal_result && $insert_card_result && $insert_address_result){
        //echo readfile('customer.html');
        //echo readfile('test.php');
        //echo '<a href = "test.php">go</a>';
        header("Location: test.php");
    } else {
        echo mysqli_error($con);
        echo '<br><a href = "Register.html">back</a>';
    }

?>