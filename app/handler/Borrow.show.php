<?php

use Controller\BorrowController;
use Controller\NotificationController;
use Controller\QueueController;
use Util\Auth;

include '../../app/config/autoloader.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['book'])) {
        Auth::isLoggedIn();
        $bookId = $_GET['book'];
        $item = new BorrowController($bookId);
        $bookInfo = $item->viewBook();
        if (!$bookInfo) {
            header("Location: ../../resource/view/pageNotFound.php");
        }
        $bookHolder = $item->bookIsHeldBy();

        $isAvailable = false;
        if ($bookHolder == null) {
            $isAvailable = true;
            $bookHolder['fullName'] = 'Central collection';
            $bookHolder['userId'] = 1;
        } else {
            $dateIssued = date_create($bookHolder['dateIssued']);
            $now = date_create(date("Y-m-d H:i:s"));
            $diff = date_diff($dateIssued, $now)->format("%R%a days");
            if ((int)$diff >= (int)$bookHolder['days']) {
                $isAvailable = true;
            }
        }
        // echo $bookHolder['dateIssued'];
        $availability = ($isAvailable) ? 'Book is available' : 'Book is not available';
        $presentlyInUseBooks = $item->currentlyUsingBooks($_SESSION['userId']);
        $isBookLimitReached = (count($presentlyInUseBooks) >= 2) ? true : false;
        $remainingBorrowingBookCount = 2 - count($presentlyInUseBooks);

        $actionArea = 0;
        $queue = new QueueController();
        if (!$queue->queueExists($_SESSION['userId'], $bookId)) {
            if (count($queue->showQueuesForBook($bookId)) > 0) {
                $actionArea = 4;
            } else {
                if ((int)$bookHolder['userId'] === 1) {
                    $actionArea = 3;
                }
            }
        } else {
            if (!$queue->isFirstInQueue($_SESSION['userId'], $bookId)) {
                $actionArea = 1;
            } else {
                $interaction = new NotificationController();
                $status = $interaction->respondStatus($_SESSION['userId'], $bookId);
                if ($status == 1) {
                    $actionArea = 2;
                } else {
                    $actionArea = 1;
                }
            }
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Auth::isLoggedIn();
    if (isset($_POST['borrowBook'])) {
        $data = $_POST['borrowBook'];
        $days = $_POST['days'];
        $requestData = explode('|', $data);

        $notify = new NotificationController();
        $queue = new QueueController();

        $queueExists = $queue->queueExists($_SESSION['userId'], $requestData[1]);

        $bookId = $requestData[1];
        if ($queueExists) {
            header("Location: ../../resource/view/borrow.php?book=$bookId");
        } else {
            $message = $notify->parseToMessage($data);
            if (!$message) {
                header("Location: ../../resource/view/pageNotFound.php");
                return false;
            }

            $isInQueue = $queue->addToQueue($_SESSION['userId'], $requestData[1], $days);
            if (!$isInQueue) {
                header("Location: ../../resource/view/pageNotFound.php");
            } else {
                $isSent = $notify->sendNotification($message, $requestData[2], $_SESSION['userId'], $requestData[1], $requestData[4]);
                if (!$isSent) {
                    header("Location: ../../resource/view/pageNotFound.php");
                } else {
                    $queueCount = $queue->showQueuesForBook($requestData[1]);
                    if ($queueCount >= 1) {
                        // header("Location: ../../resource/view/home.php");
                        header("Location: ../../resource/view/borrow.php?book=$bookId");
                    } else {
                        $notify->grantTurnToNext($requestData[1]);
                        // header("Location: ../../resource/view/home.php");
                        header("Location: ../../resource/view/borrow.php?book=$bookId");
                    }
                }
            }
        }
    }
}
?><?php
