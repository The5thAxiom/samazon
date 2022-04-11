<?php
    function printNavs($path_to_public, $links) {
        foreach($links as $i => $link) {
            echo '<a href = "' .
                $path_to_public .
                $link['href'] .
                '" class = "navlink">' .
                $link['title'] .
                '</a>';
            if ($i !== array_key_last($links)) echo ' | ';
        }
    }
?>