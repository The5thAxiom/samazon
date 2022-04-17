<?php
    session_start();
    $heading = "Cart";
    $title = "SamaZon";
    $path_to_public = '../';
    $links = [
        ["title" => "Home", "href" => "users/customer.php"],
        ["title" => "Profile", "href" => "#"],
        ["title" => "Logout", "href" => "users/logoutAction.php"],
    ];
    require '../templates/top.php';

    require '../static/database_connection.php';
    $get_cart_products = "SELECT 
        name,
        description,
        price_in_paisa,
        inventory_size,
        image_path,
        seller_email_id,
        is_sold
    FROM Products JOIN Carts USING (product_code);
    ";
    $cart_products_result = mysqli_query(
        $con,
        $get_cart_products
    );
    if (!$cart_products_result) {
?>
<article class="full">
    <h1>Cart Empty</h1>
</article>
<?php
    } else {
        for ($i = 0; $i < mysqli_num_rows($cart_products_result); $i++) {
            $cart_products[$i] = mysqli_fetch_assoc(
                $cart_products_result
            );
        }
        // var_dump($cart_products);
?>
<article class="full">
    <?php
        foreach($cart_products as $i => $product) {
            // echo for section
            echo '
    <section class="cart-product">
        <h2>'.$product['name'].'</h2>
        <div style="display: flex; flex-direction: row;">
            <img
                style="display: block"
                width="80px"
                src="'.$path_to_public.$product['image_path'].'" 
            />
            <p
                style="margin: 10px; display: block;"
            >
                '.$product['description'].'
            </p>
        </div>
    </section>
            '; // echo for section ends
        if ($i !== array_key_last($cart_products)) echo '<hr/>';
        }
    ?>
</article>
<?php
    }
?>
<?php require '../templates/bottom.php'; ?>