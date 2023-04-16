<?php

use Controller\BookController;

include '../../config/autoloader.admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['book'])) {
        $bookId = $_GET['book'];
        $items = new BookController();
        $bookInfo = $items->showBook($bookId);
        $books = $items->showAllBook();
    } else {
        header('Location: ../../resource/view/home.php');
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['book'])) {
        $bookId = $_GET['book'];
        $items = new BookController();
        $bookInfo = $items->showBook($bookId);
        $books = $items->showAllBook();
    } else {
        header('Location: ../../resource/view/home.php');
    }
}
