<?php

    $books = array(
        'The Hobbit' => array(
            'published' => 1937,
            'author' => 'J. R. R. Tolkien',
            'pages' => 310
        ),
        'Game of Thrones' => array(
            'published' => 1996,
            'author' => 'George R. R. Martin',
            'pages' => 835
        ),
        'The Catcher in the Rye' => array(
            'published' => 1951,
            'author' => 'J. D. Salinger',
            'pages' => 220
        ),
        'A Tale of Two Cities' => array(
            'published' => 1859,
            'author' => 'Charles Dickens',
            'pages' => 544
        )
    );

    echo PHP_EOL;
    foreach ($books as $title => $book) {
        foreach ($book as $key => $data) {
            echo "'{$title}': {$key} - {$data}\n";
        }
        echo PHP_EOL;
    }

    echo PHP_EOL;

    echo "These books were published after 1950\n\n";
    foreach ($books as $title => $book) {
        if ($book['published'] > 1950) {
            foreach ($book as $key => $data) {
                echo "'{$title}': {$key} - {$data}\n";
            }
            echo PHP_EOL;
        }
    }