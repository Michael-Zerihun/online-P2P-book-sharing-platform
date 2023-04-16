<?php

use Controller\NotificationController;

include '../../app/config/autoloader.php';

$messages = new NotificationController();
$notification = $messages->showNotification($_SESSION['userId']);
$isThereNotification = (count($notification) > 0) ? true : false;
if ($isThereNotification) {
}
