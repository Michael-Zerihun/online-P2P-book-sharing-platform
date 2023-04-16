<?php

namespace Model;

use Database\MysqlDB;

class Queue extends MysqlDB
{

    protected function queueForBook($bookId)
    {
        $sql = "SELECT COUNT(*) AS `turn` FROM `queue` WHERE bookId = $bookId And `status` = 1";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_assoc($result);
            return $bookStatus;
        }
    }
    protected function userQueueForBook($userId)
    {
        $sql = "SELECT * FROM `queue` WHERE `userId` = $userId And `status` = 1";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $queueStatus = mysqli_fetch_all($result);
            return $queueStatus;
        }
    }
    protected function deleteQueue($userId, $bookId)
    {
        $sql = "UPDATE `queue` SET `status`='0' WHERE userId = $userId AND bookId = $bookId;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $queueStatus = mysqli_fetch_assoc($result);
            return $queueStatus;
        }
    }
    protected function addQueue($userId, $bookId, $days)
    {
        $sql = "INSERT INTO `queue` (`userId`, `bookId`, `days`) VALUES ('$userId', '$bookId', '$days');";
        return mysqli_query($this->connect(), $sql);
    }
    protected function getAllBookInQueue()
    {
        $sql = "SELECT `id`, `bookId`, COUNT(*) AS `peopleInQueue`, `date` 
                    FROM `queue` WHERE `status` = 1 GROUP BY `bookId` ORDER BY `date`;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $queueStatus = mysqli_fetch_all($result);
            return $queueStatus;
        }
    }
    protected function getQueuesForBook($bookId)
    {
        $sql = "SELECT * FROM `queue` WHERE bookId = $bookId And `status` = 1";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $bookStatus = mysqli_fetch_all($result);
            return $bookStatus;
        }
    }
    protected function searchForQueue($userId, $bookId)
    {
        $sql = "SELECT COUNT(*) AS `numQueue` FROM `queue` 
                WHERE `userId` = $userId AND `bookId` = $bookId AND `status` = 1";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $queueCount = mysqli_fetch_assoc($result);
            return $queueCount;
        }
    }
    protected function firstInQueue($bookId){
        $sql = "SELECT `userId` FROM `queue` 
                WHERE `bookId` = $bookId AND `status` = 1 ORDER BY `date` ASC LIMIT 1;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $turn = mysqli_fetch_assoc($result);
            return $turn;
        }
    }
}
