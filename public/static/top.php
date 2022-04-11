<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="<?php echo $path_to_public; ?>static/samazon.css" />
        <title><?php echo $title; ?></title>
    </head>

    <body>
        <header>
            <h1><?php echo $heading; ?></h1>
        </header>
            <?php
                require 'printNavs.php';
                if (!empty($links)) {
                    echo '<nav class="top">';
                    printNavs($path_to_public, $links);
                    echo '</nav>';
                }
            ?>
        <main>