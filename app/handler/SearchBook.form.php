<?php

use Controller\BookController;
use Util\DataCleaner;

include '../../app/config/autoloader.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['findBook'])) {
        $findBook = DataCleaner::sanitizeInput($_GET['findBook']);
        $items = new BookController();
        $books = $items->searchBook($findBook);
        $test = 'there are some book';
        if($books === false){
            $test = 'there are no book';
        }
    } else {
        $items = new BookController('', '');
        $books = $items->showAllBook();
        
    }
}
