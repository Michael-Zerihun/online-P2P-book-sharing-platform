<?php

namespace Controller;

use Model\Queue;

class QueueController extends Queue
{
    public function checkQueueForBook($bookId)
    {
        return $this->queueForBook($bookId);
    }
    public function userQueue($userId)
    {
        return $this->userQueueForBook($userId);
    }
    public function deleteQueueOfBookForUser($bookId, $userId)
    {
        return $this->deleteQueue($userId, $bookId);
    }
    public function addToQueue($userId, $bookId, $days)
    {
        return $this->addQueue($userId, $bookId, $days);
    }
    public function showAllBookInQueue()
    {
        return $this->getAllBookInQueue();
    }
    public function showQueuesForBook($bookId)
    {
        return $this->getQueuesForBook($bookId);
    }
    public function queueExists($userId, $bookId)
    {
        $queueCount = $this->searchForQueue($userId, $bookId);
        if ((int)$queueCount['numQueue'] > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function isFirstInQueue($userId, $bookId)
    {
        $userInQueue = $this->firstInQueue($bookId);
        if ((int) $userInQueue['userId'] === (int) $userId) {
            return true;
        }
        return false;
    }
}
