<?php
    require '../static/db.php';

    function handleNull(string $str): string {
        if ($str == '') return 'NULL';
        else return "'$str'";
    }

    // Accounts
    $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $user_is_seller = $_POST['seller'] == 'Y' ? 'true' : 'false';
    $user_is_buyer = $_POST['buyer'] == 'Y' ? 'true' : 'false';

    // PersonalDetails Table
    $country_code = mysqli_real_escape_string($con, $_POST['country_code']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = handleNull(mysqli_real_escape_string($con, $_POST['middle_name']));
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    
    //Address table
    $house = mysqli_real_escape_string($con, $_POST['house']);
    $street_name = handleNull(mysqli_real_escape_string($con, $_POST['street_name']));
    $locality = handleNull(mysqli_real_escape_string($con, $_POST['locality']));
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $pin_code = mysqli_real_escape_string($con, $_POST['pin_code']);
    $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);

    // CardDetails
    $card_no = mysqli_real_escape_string($con, $_POST['card_no']);
    $expiry_month = mysqli_real_escape_string($con, $_POST['expiry_month']);
    $expiry_year = mysqli_real_escape_string($con, $_POST['expiry_year']);
    $name_as_on_card = mysqli_real_escape_string($con, $_POST['name_as_on_card']);

    $insert_account = "
    INSERT
        INTO Accounts (
            email_id,
            password,
            user_is_seller,
            user_is_buyer
        ) VALUES (
            '$email_id',
            '$password',
            $user_is_seller,
            $user_is_buyer
        );
    ";
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
            gender
        )
        VALUES (
            '$email_id',
            $country_code,
            $phone_no,
            '$first_name',
            $middle_name,
            '$last_name',
            '$date_of_birth',
            '$gender'
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

    if (
        mysqli_query($con, $insert_account) &&
        mysqli_query($con, $insert_personal) &&
        mysqli_query($con, $insert_address) &&
        mysqli_query($con, $insert_card)
    ) header("Location: ../testing/index.php");
    else {
        echo mysqli_error($con);
        echo '<br><a href = "register.php">back</a>';
    }
    mysqli_close($con);
?>