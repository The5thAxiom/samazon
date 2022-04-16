<?php
    session_start();
    if (!array_key_exists('user_email_id', $_SESSION)) die;
    require '../static/database_connection.php';

    $get_name = "SELECT first_name
        FROM PersonalDetails
        WHERE email_id = '".$_SESSION['user_email_id'].
        "';";
    $result = mysqli_fetch_assoc(mysqli_query($con, $get_name));

    foreach ($result as $key => $value)
        echo $key . " => " . $value;

    $heading = "Welcome back " . $result['first_name'];
    $title = 'SamaZon Shopping';
    $path_to_public = '../';
    $links = [
        ["title" => "Profile", "href" => "#"],
        ["title" => "Cart", "href" => "#"],
        ["title" => "Wishlists", "href" => "#"],
        ["title" => "Recents", "href" => "#"],
        ["title" => "Logout", "href" => "users/logoutAction.php"],
    ];
    require '../templates/top.php';
?>
<main>
    <article>
        <a href="#">
            <h2 id="Search">Search</h2>
        </a>
        <input
            class="text"
            placeholder="From over num items"
            style="width: 100%"
            type="search"
        />
        <hr />
        <a href="#">
            <h2 id="NewItems">New Items</h2>
        </a>
        dummy assets/images<br />
        <img class="sectionimage" src="<?php echo $path_to_public; ?>assets/images/box.jpg" />
        dummy assets/images<br />
        <img class="sectionimage" src="<?php echo $path_to_public; ?>assets/images/box.jpg" />
        dummy assets/images<br />
        <img class="sectionimage" src="<?php echo $path_to_public; ?>assets/images/box.jpg" />
        <hr />
        <a href="#">
            <h2 id="Categories">Categories</h2>
        </a>
        a<br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a <br />
        a
        <br />
        <hr />
        <a href="#">
            <h2 id="UpcomingSellers">Upcoming sellers</h2>
        </a>
        recent items here<br />
        <hr />
        <a href="#">
            <h2 id="BuyAgain">Buy Again</h2>
        </a>
        These will be dummy assets/images gotten from the user buying
        history<br />
        dummy assets/images<br />
        <img class="sectionimage" src="<?php echo $path_to_public; ?>assets/images/box.jpg" />
        dummy assets/images<br />
        <img class="sectionimage" src="<?php echo $path_to_public; ?>assets/images/box.jpg" />
        dummy assets/images<br />
        <img class="sectionimage" src="<?php echo $path_to_public; ?>assets/images/box.jpg" />
    </article>
    <aside id="aside">
        <a class="navlink" href="#Search">Search</a><br />
        <hr />
        <a class="navlink" href="#NewItems">New Items</a><br />
        <hr />
        <a class="navlink" href="#Categories">Categories</a><br />
        <hr />
        <a class="navlink" href="#UpcomingSellers">Upcoming Sellers</a
        ><br />
        <hr />
        <a class="navlink" href="#BuyAgain">Buy Again</a><br />
        <hr />
    </aside>
</main>
<?php require '../templates/bottom.php'; ?>