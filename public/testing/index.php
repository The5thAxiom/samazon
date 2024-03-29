<?php
    require '../static/database_connection.php';
    require 'printTable.php';
    $heading = 'Testing';
    $title = 'testing';
    $links = [
        ["title" => "Home", "href" => "index.php"],
        ["title" => "Register", "href" => "users/register.php"]
    ];
    $path_to_public = '../';
    require '../templates/top.php';
?>
<article class="full layout-box">
    <span style="padding-left: 0px;" class="slogan slogan-heading" id="jsdata"></span>
    <h2>Personal Data</h2>
    <table>
        <tr>
            <th>Email ID</th>
            <th>Image path</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Joined On</th>
            <th>Is the user a seller too?</th>
            <th>Gender</th>
            <th>Date of birth</th>
            <th>Country Code</th>
            <th>Phone Number</th>
        </tr>
        <?php
            printTable(1, $path_to_public, mysqli_query($con,
                "
                    SELECT
                        email_id,
                        image_path,
                        first_name,
                        middle_name,
                        last_name,
                        joined_on,
                        user_is_seller,
                        gender,
                        date_of_birth,
                        country_code,
                        phone_no
                    FROM
                        PersonalDetails
                            JOIN Accounts USING (email_id)
                    ORDER BY id;
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
            printTable(-1, $path_to_public, mysqli_query($con,
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
                    ORDER BY id;
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
            printTable(-1, $path_to_public, mysqli_query($con,
                "
                    SELECT
                        email_id,
                        card_no,
                        expiry_month,
                        expiry_year,
                        name_as_on_card
                    FROM
                        CardDetails
                    ORDER BY id;
                "
            ));
        ?>
    </table>
    <h2>Bank Details</h2>
    <table>
        <tr>
            <th>Email ID</th>
            <th>Full Name</th>
            <th>City</th>
            <th>Bank Name</th>
            <th>Branch Name</th>
            <th>IFSC Code</th>
            <th>Account Number</th>
        </tr>
        <?php
            printTable(-1, $path_to_public, mysqli_query($con,
                "
                SELECT
                    email_id,
                    full_name,
                    city,
                    bank_name,
                    branch_name,
                    ifsc_branch_code,
                    account_no
                FROM
                    BankDetails
                ORDER BY id
                "
            )); 
        ?>
    </table>
    <h2>Products</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Price (in paisa)</th>
            <th>Inventory Size</th>
            <th>Seller</th>
            <th>Added on</th>
            <th>Image path</th>
        </tr>
        <?php
            printTable(6, $path_to_public, mysqli_query($con,
            "
            SELECT
                name,
                description,
                price_in_paisa,
                inventory_size,
                seller_email_id,
                added_on,
                image_path
            FROM Products
            ORDER BY product_code;
            "
            ));
        ?>
    </table>
    <h2>Product Reviews</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Reviewer</th>
            <th>Review Date</th>
            <th>Review Time</th>
            <th>Rating</th>
            <th>Review Title</th>
            <th>Review Text</th>
        </tr>
        <?php
            printTable(-1, $path_to_public, mysqli_query(
                $con,
                "
                    SELECT
                        Products.name,
                        reviewer_email_id,
                        review_date,
                        review_time,
                        rating_out_of_five,
                        review_title,
                        review_text
                    FROM ProductReviews 
                            JOIN Products USING (product_code)
                    ORDER BY product_code;
                "
            ));
        ?>
    </table>
    <h2>Orders and Payments</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Buyer</th>
            <th>Seller</th>
            <th>Order Status</th>
            <th>Order Date</th>
            <th>Order Time </th>
            <th>Payment Amount (in paisa)</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Payment Date</th>
            <th>Payment Time</th>
        </tr>
        <?php
            printTable(-1, $path_to_public, mysqli_query(
                $con,
                "
                    SELECT
                        Products.name,
                        Orders.buyer_email_id,
                        Products.seller_email_id,
                        Orders.order_status,
                        Orders.order_date,
                        Orders.order_time,
                        Payments.payment_amount_in_paisa,
                        Payments.payment_type,
                        Payments.payment_status,
                        Payments.payment_date,
                        Payments.payment_time
                    FROM Orders
                        JOIN Payments ON Payments.id = Orders.payment_id
                        JOIN Products ON Orders.product_code = Products.product_code
                    ORDER BY Orders.id;
                "
            ));
        ?>
    </table>
    <h2>Carts</h2>
    <table>
        <tr>
            <th>Buyer</th>
            <th>Price (in paisa)</th>
            <th>Product Name</th>
            <th>Seller</th>
        </tr>
        <?php
            printTable(-1, $path_to_public, mysqli_query(
                $con,
                "
                    SELECT
                        buyer_email_id,
                        price_in_paisa,
                        name,
                        seller_email_id
                    FROM Carts
                        JOIN Products USING (product_code)
                    ORDER BY Carts.id;
                "
            ));
        ?>
    </table>
</article>
<?php require '../templates/bottom.php'; ?>