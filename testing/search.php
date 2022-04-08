<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <link rel="stylesheet" href="../samazon.css">
    <title>Testing User Search</title>
</head>
<?php
    require '../db.php';
    require './printTable.php';
?>
<body>
    <header class="layout-box">
        <span class="slogan">
            Database Testing
        </span> <br>
        Testing PHP, and a bit of JS
    </header>
    <nav class="top layout-box">
        <a href="./index.php" class="navlink"> testing </a>
    </nav>
    <main>
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
                    $result = mysqli_query(
                        $con,
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
                                AllData
                            WHERE
                                first_name = '$keyword'
                                OR middle_name = '$keyword'
                                OR last_name = '$keyword';
                        "
                    );
                    if (
                        !$result || // query failed
                        mysqli_num_rows($result) == 0 || // now rows found
                        $keyword == 'NULL' // nothing was searched
                    ) echo "<br>Nothing found";
                    else { /* Displaying whatever was returned as a table */
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
                        printTable($result);
                        echo "</table>";
                    }
                }
            ?>
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