<?php
    $heading = 'Login';
    $title = 'login';
    $path_to_public = '../';
    $links = [
        ['title' => 'Home', 'href' => 'index.php'],
        ['title' => 'About', 'href' => 'about.php']
    ];
    require '../static/top.php';
?>

<article class="full">
    <a href="customer.html">Go</a><br />
    <form action="loginAction.php" method="POST">
        <label for="email_id"> Email Id: </label> <br />
        <input
            name="email_id"
            class="text"
            id="email_id"
            type="email"
            placeholder="Email Id"
        />
        <br /><br />
        <label for="password">Password:</label> <br />
        <input
            name="password"
            id="password"
            class="text"
            type="password"
            placeholder="Password"
        />
        <br /><br />
        <input type="submit" class="button" />
    </form>
</article>

<?php require '../static/bottom.php'; ?>