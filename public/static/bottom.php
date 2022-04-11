        </main>
        <nav class="bottom">
            <a class="navlink" href="#">Top</a>
        <?php
            if (!empty($links)) {
                echo ' | ';
                printNavs($path_to_public, $links);
            }
        ?>
        </nav>
        <footer>
            <a href="<?php echo $path_to_public; ?>index.php">
                <img src="<?php echo $path_to_public; ?>assets/images/logo2.jpg" class="smallimage" />
            </a>
            <br />
            Made by Sam
        </footer>
    </body>
</html>