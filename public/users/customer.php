<?php
    $title = 'login'
?>
        <nav class="top">
            <a class="navlink" href="#">Profile</a> |
            <a class="navlink" href="#">Cart</a> |
            <a class="navlink" href="#">Wishlists</a> |
            <a class="navlink" href="#">Recents</a> |
            <a class="navlink" href="login.php">Logout</a>
        </nav>
        <main>
            <article>
                <div class="slogan">Hello <span class="name"></span></div>
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
                <img class="sectionimage" src="assets/images/box.jpg" />
                dummy assets/images<br />
                <img class="sectionimage" src="assets/images/box.jpg" />
                dummy assets/images<br />
                <img class="sectionimage" src="assets/images/box.jpg" />
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
                <img class="sectionimage" src="assets/images/box.jpg" />
                dummy assets/images<br />
                <img class="sectionimage" src="assets/images/box.jpg" />
                dummy assets/images<br />
                <img class="sectionimage" src="assets/images/box.jpg" />
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
        <nav class="bottom">
            <a class="navlink" href="#">Top</a> |
            <a class="navlink" href="index.php">Home</a> |
            <a class="navlink" href="login.php">Logout</a> |
            <a class="navlink" href="about.php">About SamaZon</a>
        </nav>
        <footer>
            <a href="index.php"
                ><img src="assets/images/logo2.jpg" class="smallimage" /></a
            ><br />
            Made by Sam
        </footer>
    </body>
    <script>
        var nameElements = document.getElementsByClassName('name');
        for (var i = 0; i < nameElements.length; i++) {
            nameElements[i].innerHTML = 'Sam';
        }
    </script>
</html>