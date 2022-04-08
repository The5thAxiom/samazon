<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <link rel="stylesheet" href="../samazon.css">
    <title>Testing</title>
</head>
<?php
    require '../db.php';
    require 'printTable.php';
?>
<body>
    <header class="layout-box">
        <span class="slogan">
            Database Testing
        </span> <br>
        Testing PHP, and a bit of JS
    </header>
    <nav class="top layout-box">
        <a href="./search.php" class="navlink"> search-users-tables </a>
    </nav>
    <main>
        <article class="full layout-box">
            <span style="padding-left: 0px;" class="slogan slogan-heading" id="jsdata"></span>
            <h2>Personal Data</h2>
            <table>
                <tr>
                    <th>Email ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>Country Code</th>
                    <th>Phone Number</th>
                </tr>
                <?php
                    printTable(mysqli_query($con,
                        "
                            SELECT
                                email_id,
                                first_name,
                                middle_name,
                                last_name,
                                gender,
                                date_of_birth,
                                country_code,
                                phone_no
                            FROM
                                PersonalDetails
                            ORDER BY
                                email_id;
                        "
                    ));
                ?>
            </table>
            <h2>Addresses</h2>
            <table>
                <tr>
                    <th>Email ID</th>
                    <th>House</th>
                    <th>Street Name</th>
                    <th>Locality</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Pin Code</th>
                    <th>Contact Number</th>
                </tr>
                <?php
                    printTable(mysqli_query($con,
                        "
                            SELECT
                                email_id,
                                house,
                                street_name,
                                locality,
                                city,
                                state,
                                pin_code,
                                contact_no
                            FROM
                                Address
                            ORDER BY
                                email_id;
                        "
                    ));
                ?>
            </table>
            <h2>Card Details</h2>
            <table>
                <tr>
                    <th>Email ID</th>
                    <th>Card Number</th>
                    <th>Month of Expiry</th>
                    <th>Year of Expiry</th>
                    <th>Name (as on card)</th>
                </tr>
                <?php
                    printTable(mysqli_query($con,
                        "
                            SELECT
                                email_id,
                                card_no,
                                expiry_month,
                                expiry_year,
                                name_as_on_card
                            FROM
                                CardDetails
                            ORDER BY
                                email_id;
                        "
                    ));
                ?>
            </table>
        </article>
    </main>
    <footer>
        <a href = "../index.php"><img src="../images/logo2.jpg" class = "smallimage"></a><br>
        Made by Sam
    </footer>
</body>
<?php mysqli_close($con) ?>
<script>
    document.getElementById("jsdata").innerHTML = `DB: <?php echo "$db_name"; ?>`;
</script>
</html>