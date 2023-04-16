<?php

namespace Controller;

use Model\Book;

class BorrowController extends Book
{
    private $bookId;
    public function __construct($bookId)
    {
        $this->bookId = $bookId;
    }
    public function viewBook()
    {
        return $this->getBook($this->bookId);
    }
    public function bookCurrentlyHolding($userId)
    {
        return $this->bookHolding($userId);
    }
    public function bookIsHeldBy()
    {
        return $this->bookHolder($this->bookId);
    }
    public function currentlyUsingBooks($userId)
    {
        return $this->booksInUse($userId);
    }
}
