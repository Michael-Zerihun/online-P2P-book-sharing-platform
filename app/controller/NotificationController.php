<?php

namespace Controller;

use Model\Notification;
use Model\User;

class NotificationController extends Notification
{
    public $messageArray = [
        ' is asking for the book ', ' responded to your request about book | you can come and collect it at | place',
        'Did you give | the book ', 'did you receive the book | from ', ' is saying they did not give you | book',
        ' is saying they did not give | book ', ' is saying they did not receive the book | from you.',
        'is saying they did not receive the book | from ', ' refused to give x the book ',
        ' is saying the you refused to give book ', 'reported you for false alter', ' reported | for false alert'
    ];
    public function showNotification($userId)
    {
        return $this->getNotification($userId);
    }
    public function sendNotification($msg, $msgTo, $msgFrom, $bookId, $type)
    {
        $msg = str_replace("'", "''", $msg);
        return $this->saveNotification($msg, $msgTo, $msgFrom, $bookId, $type);
    }
    public function deleteNotification($notificationId)
    {
        return $this->updateAsDeletedNotification($notificationId);
    }
    public function markAsResponded($notificationId)
    {
        return $this->updateAsResponded($notificationId);
    }
    public function parseToMessage($message)
    {
        $messageComponents = explode('|', $message);
        if (!$messageComponents or empty($messageComponents)) {
            return false;
        }
        switch ($messageComponents[4]) {
            case 0:
                $msg = $messageComponents[6] . $this->messageArray[0] . $messageComponents[0];
                break;
            case 1:
                $msgPart = explode('|', $this->messageArray[1]);
                $msg = $messageComponents[6] . $msgPart[0] . $messageComponents[0] . $msgPart[1] . $messageComponents[7];
                break;
            case 2:
                $msgPart = explode('|', $this->messageArray[2]);
                $msg = $msgPart[0] . $messageComponents[6] . $msgPart[1] . $messageComponents[0] . $msgPart[2] . $messageComponents[3];
                break;
            case 3:
                $msgPart = explode('|', $this->messageArray[3]);
                $msg = $msgPart[0] . $messageComponents[0] . $msgPart[1] . $messageComponents[6];
                break;
            case 4:
                $msg = $messageComponents[6] . $this->messageArray[4] . $messageComponents[0];
                break;
            case 5:
                $msg = $messageComponents[6] . $this->messageArray[5] . $messageComponents[0];
                break;
            case 6:
                $msgPart = explode('|', $this->messageArray[6]);
                $msg = $messageComponents[6] . $msgPart[0] . $messageComponents[0] . $msgPart[1];
                break;
            case 7:
                $msgPart = explode('|', $this->messageArray[7]);
                $msg = $messageComponents[6] . $msgPart[0] . $messageComponents[0] . $msgPart[1];
                break;
            case 8:
                $msgPart = explode('|', $this->messageArray[8]);
                $msg = $messageComponents[3] . $msgPart[0] . $messageComponents[6] . $msgPart[1] . $messageComponents[0];
                break;
            case 9:
                $msg = $messageComponents[6] . $this->messageArray[9] . $messageComponents[0];
                break;
            case 10:
                $msg = $messageComponents[6] . $this->messageArray[10] . $messageComponents[0];
                break;
            case 11:
                $msgPart = explode('|', $this->messageArray[11]);
                $msg = $messageComponents[6] . $msgPart[0] . $messageComponents[3] . $msgPart[1];
                break;
        }
        return $msg;
    }
    public function changeNotificationDestination($bookId, $currentHolderId)
    {
        return $this->updateNotificationDestination($bookId, $currentHolderId);
    }
    public function grantTurnToNext($bookId)
    {
        return $this->updateTurnToNext($bookId);
    }
    public function respondStatus($userId, $bookId)
    {
        $status = $this->getResponseStatus($userId, $bookId);
        if ($status == null) {
            return 0;
        }
        return $status['respondStatus'];
    }
}
