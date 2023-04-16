<?php

namespace Model;

use Database\MysqlDB;

class Book extends MysqlDB
{
    protected function searchMatchBook($identifier)
    {
        $sql = "SELECT `bookId`, `name`, `shortDescription`, `image` FROM `book`
                        WHERE `name` LIKE '%$identifier%' OR `owner` LIKE '%$identifier%'";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_all($result);
            if ($bookStatus == null) {
                return false;
            } else {
                return $bookStatus;
            }
        }
    }
    protected function getAllBooks()
    {
        $sql = "SELECT `bookId`, `name`, `shortDescription`, `image` FROM `book` ";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_all($result);
            if ($bookStatus == null) {
                return false;
            } else {
                return $bookStatus;
            }
        }
    }
    protected function getAllBooksShortDisc()
    {
        $sql = "SELECT `bookId`, `name`, `owner`, `image`, `dateAdded` FROM `book` ";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_all($result);
            if ($bookStatus == null) {
                return false;
            } else {
                return $bookStatus;
            }
        }
    }
    
    protected function addBook($bookName, $bookOwner, $bookGenre, $bookShDesc, $bookLgDesc, $bookImage)
    {
        $sql = "INSERT INTO `book` (`name`, `shortDescription`, `longDescription`, `owner`, `genre`, `image`)
                    VALUES ('$bookName', '$bookShDesc', '$bookLgDesc', '$bookOwner', '$bookGenre', '$bookImage');";
        return mysqli_query($this->connect(), $sql);
    }
    protected function getBook($bookId)
    {
        $sql = "SELECT * FROM `book` WHERE `bookId` = $bookId";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_assoc($result);
            return $bookStatus;
        }
    }
    protected function bookHolding($userId)
    {
        $sql = "SELECT U.fullName, H.userId, H.bookId, H.dateIssued 
                    FROM user AS U JOIN holding AS H
                    ON U.userId = $userId and U.userId = H.userId;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_all($result);
            return $bookStatus;
        }
    }
    protected function booksInUse($userId)
    {
        $sql = "SELECT * FROM holding 
                    WHERE userId = $userId AND 
                    DATE(dateIssued) >= DATE_SUB(CURDATE(), INTERVAL `days` DAY)";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_all($result);
            return $bookStatus;
        }
    }
    protected function bookHolder($bookId)
    {
        $sql = "SELECT U.userId, U.fullName, H.bookId, H.dateIssued, H.days
                    FROM user AS U JOIN holding AS H 
                    ON H.bookId = $bookId and U.userId = H.userId;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $holder = mysqli_fetch_assoc($result);
            return $holder;
        }
    }
    protected function bookImage($bookId)
    {
        $sql = "SELECT `image` FROM book WHERE bookId = $bookId ";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $image = mysqli_fetch_assoc($result);
            return $image;
        }
    }

    protected function updateBookInfo($bookId, $bookName, $bookOwner, $bookGenre, $bookShDesc, $bookLgDesc, $bookImage)
    {
        $sql = "UPDATE `book` SET `name` = '$bookName', `owner` = '$bookOwner',
                `genre` = '$bookGenre', `shortDescription` = '$bookShDesc', 
                `longDescription` = '$bookLgDesc', `image` = '$bookImage' WHERE bookId = $bookId ";
        if (mysqli_query($this->connect(), $sql)) {
            $queryStatus = mysqli_query($this->connect(), $sql);
            // $queryStatus = mysqli_fetch_assoc($result);
            return $queryStatus;
        }
    }
}
