<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="samazon.css" />
        <title>SamaZon | Customer Login</title>
    </head>

    <body>
        <header>
            <h1>Customer Login</h1>
        </header>
        <nav class="top">
            <a class="navlink" href="index.php">Home</a> |
            <a class="navlink" href="about.html">About</a>
        </nav>
        <section>
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
        </section>

        <nav class="bottom">
            <a class="navlink" href="#">Top</a> |
            <a class="navlink" href="index.php">Home</a> |
            <a class="navlink" href="about.html">About</a>
        </nav>
        <?php include('footer.php'); ?>
    </body>
</html>
