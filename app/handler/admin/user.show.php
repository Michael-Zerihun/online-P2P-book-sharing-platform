<?php

use Controller\UserController;

$items = new UserController();
$users = $items->showAllUsers();
// echo '<pre>';
// print_r($users);
// echo '</pre>';