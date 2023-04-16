<?php

namespace Controller;

use Model\Book;

class BookController extends Book
{
    private $bookId;
    private $name;
    private $shortDescription;
    private $longDescription;
    private $genre;
    private $owner;
    public function showBook($bookId)
    {
        return $this->getBook($bookId);
    }
    public function searchBook($identifier)
    {
        return $this->searchMatchBook($identifier);
    }
    public function showAllBook()
    {
        return $this->getAllBooks();
    }
    public function showAllBookShortDisc()
    {
        return $this->getAllBooksShortDisc();
    }
    public function getBookImage($bookId)
    {
        return $this->bookImage($bookId);
    }
    public function editBook($bookId, $bookName, $bookOwner, $bookGenre, $bookShDesc, $bookLgDesc, $bookImage){
        return $this->updateBookInfo($bookId, $bookName, $bookOwner, $bookGenre, $bookShDesc, $bookLgDesc, $bookImage);
    }
    public function createBook($bookName, $bookOwner, $bookGenre, $bookShDesc, $bookLgDesc, $bookImage){
        return $this->addBook($bookName, $bookOwner, $bookGenre, $bookShDesc, $bookLgDesc, $bookImage);
    }
}
