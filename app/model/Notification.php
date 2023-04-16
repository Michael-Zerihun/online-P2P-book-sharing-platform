<?php

namespace Model;

use Database\MysqlDB;

class Notification extends MysqlDB
{
    protected function saveNotification($msg, $msgTo, $msgFrom, $bookId, $type)
    {
            $sql = "INSERT INTO `notification` (`msg`, `msgTo`, `msgFrom`, `bookId`, `type`) 
                    VALUES ('$msg', '$msgTo', '$msgFrom', '$bookId', '$type');";
        return mysqli_query($this->connect(), $sql);
    }
    protected function getNotification($userId)
    {
        $sql = "SELECT * FROM `notification` WHERE msgTo = $userId 
                And `status` = 1 AND `isTurn`='1' ORDER BY `dateSent` DESC;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $notifications = mysqli_fetch_all($result);
            return $notifications;
        }
    }
    protected function updateAsDeletedNotification($notificationId)
    {
        $sql = "UPDATE `notification` SET `status`='1' WHERE `id` = $notificationId;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $notifications = mysqli_fetch_assoc($result);
            return $notifications;
        }
    }
    protected function updateAsResponded($notificationId)
    {
        $sql = "UPDATE `notification` SET `respondStatus`='1' WHERE `id` = $notificationId;";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $notifications = mysqli_fetch_assoc($result);
            return $notifications;
        }
    }
    protected function updateNotificationDestination($bookId, $currentHolderId)
    {
        $sql = "UPDATE `notification` SET `msgTo` ='$currentHolderId' WHERE `bookId` = $bookId;";
        return mysqli_query($this->connect(), $sql);
    }
    protected function updateTurnToNext($bookId)
    {
        $sql = "UPDATE `notification` SET `isTurn`='1' 
                WHERE `status` = 1 AND `bookId` = $bookId
                ORDER BY `dateSent` ASC LIMIT 1;";
        echo $bookId;
        return mysqli_query($this->connect(), $sql);
    }
    protected function getResponseStatus($bookHolderId, $bookId)
    {
        $sql = "SELECT `respondStatus` FROM `notification` WHERE msgFrom = $bookHolderId
                    And `status` = 1 AND `bookId` = $bookId and `isTurn` = 1";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $status = mysqli_fetch_assoc($result);
            return $status;
        }
    }
}
