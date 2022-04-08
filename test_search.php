<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <link rel="stylesheet" href="samazon.css">
    <title>DB Testing | Searching</title>
</head>
<?php
    $server_name = 'sql6.freemysqlhosting.net';
    $user_name = 'sql6484450';
    $user_password = '76FIzvkBGF';
    $db_name = 'sql6484450';
    $con = mysqli_connect(
        $server_name,
        $user_name,
        $user_password,
        $db_name
    );
    $nullString = '-';
?>
<body>
    <header class="layout-box">
        <span class="slogan">
            Database Testing
        </span> <br>
        Testing PHP, and a bit of JS
    </header>
    <nav class="top layout-box">
        <a href="index.php" class="navlink"> Home </a> <!-- |
        <a href="Register.html" class="navlink"> Register </a> -->
    </nav>
    <section>
        <article class = "full layout-box">
            <span style="padding-left: 0px;" class="slogan slogan-heading"> Search DB: </span>
            <form method="get">
                <input name = "search-keyword" class = "text" type="search" placeholder="Search for a name">
                <button class = "button" name = "submit" type="submit"> Search </button>
            </form>
            <br />
            <?php
                if (isset($_GET['submit'])) { /* If the submit button was clicked */
                    $keyword = mysqli_real_escape_string($con, $_GET['search-keyword']);
                    /* The query to get Personal details from the search term */
                    $sql = "
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
                            AllData
                        WHERE
                            first_name = '$keyword'
                            OR middle_name = '$keyword'
                            OR last_name = '$keyword';
                    ";
                    $result = mysqli_query($con, $sql);
                    if (
                        !$result || // query failed
                        mysqli_num_rows($result) == 0 || // now rows found
                        $keyword == 'NULL' // nothing was searched
                    ) {
                        echo "<br>Nothing found";
                    } else { /* Displaying whatever was returned as a table */
                        echo mysqli_num_rows($result);
                        echo " result(s) found for '$keyword':<br><br>";
                        echo "
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
                        ";
                        for ($j = 0; $j < mysqli_num_rows($result); $j++) { /* for each row in the result */
                            $row = mysqli_fetch_row($result);
                            echo '<tr>';
                            for ($i = 0; $i < sizeof($row); $i++) { /* for each element in row */
                                $attribute = $row[$i];
                                if ($attribute == "") {$attribute = $nullString;}
                                echo "<td>$attribute</td>";
                            }
                            echo '</tr>';
                        }
                        echo "</table>";
                    }
                }
            ?>
        </article>
        <article class="full layout-box">
            <span style="padding-left: 0px;" class="slogan slogan-heading" id="jsdata"></span>
            <a href = "index.php">hello </a>
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
                    $sql = "
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
                    ";
                    $result = mysqli_query($con, $sql);
                    for ($j = 0; $j < mysqli_num_rows($result); $j++) {
                        $row = mysqli_fetch_row($result);
                        echo '<tr>';
                        for ($i = 0; $i < sizeof($row); $i++) {
                            $attribute = $row[$i];
                            if ($attribute == "") {$attribute = $nullString;}
                            echo "<td>$attribute</td>";
                        }
                        echo '</tr>';
                    }
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
                    $sql = "
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
                    ";
                    $result = mysqli_query($con, $sql);
                    for ($j = 0; $j < mysqli_num_rows($result); $j++) {
                        $row = mysqli_fetch_row($result);
                        echo '<tr>';
                        for ($i = 0; $i < sizeof($row); $i++) {
                            $attribute = $row[$i];
                            if ($attribute == "") {$attribute = $nullString;}
                            echo "<td>$attribute</td>";
                        }
                        echo '</tr>';
                    }
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
                    $sql = "
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
                    ";
                    $result = mysqli_query($con, $sql);
                    for ($j = 0; $j < mysqli_num_rows($result); $j++) {
                        $row = mysqli_fetch_row($result);
                        echo '<tr>';
                        for ($i = 0; $i < sizeof($row); $i++) {
                            $attribute = $row[$i];
                            if ($attribute == "") {$attribute = $nullString;}
                            echo "<td>$attribute</td>";
                        }
                        echo '</tr>';
                    }
                ?>
            </table>
        </article>
    </section>
    <footer class="layout-box">
        <a href="index.php"><img src="images/logo2.jpg" class="smallimage"></a><br> Made by Sam
    </footer>
</body>
<script>
    document.getElementById("jsdata").innerHTML = `DB: <?php echo "$db_name"; ?>`;
</script>
</html>