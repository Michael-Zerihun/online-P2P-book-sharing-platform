<?php

use Controller\BookController;

include '../../app/config/autoloader.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['book'])) {
        $bookId = $_GET['book'];
        $items = new BookController();
        $bookInfo = $items->showBook($bookId);
        $books = $items->showAllBook();
    } else {
        header('Location: ../../resource/view/home.php');
    }
}
