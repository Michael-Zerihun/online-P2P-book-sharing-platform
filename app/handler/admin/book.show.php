<?php

use Controller\BookController;

$items = new BookController();
$books = $items->showAllBookShortDisc();
// echo '<pre>';
// print_r($books);
// echo '</pre>';