<?php

use Util\Style;

include '../../app/config/autoloaderForview.php';
ob_start();
session_start();
$index = '/projects/hcdv-7/resource/view/index.php';
$borrow = '/projects/hcdv-7/resource/view/borrow.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/final.css" />
    <script src="./js/script.js" defer></script>
    <title>Home</title>
    <style>
    </style>
</head>

<body <?php echo Style::routeCssClass() ?> onpageshow="focus()">
    <!-- <div class="css-holder bg-green-300 bg-orange-300 w-1 h-1 min-h-screen h-full overflow-scroll custom-scroll hidden"></div> -->
    <div class="w-full ">
        <nav class="bg-slate-700 py-2 px-5 shadow-md">
            <div class="container flex gap-10 pl-5">
                <a href="./index.php" class="text-white font-bold">Library</a>
                <button class="bg-blue-500 w-5 h-5 hidden">
                    <span>dr</span>
                </button>
                <div class="container lg:block hidden">
                    <ul class="px-2 flex gap-10">
                        <li class="text">
                            <a href="./home.php" class="text-white">Home </a>
                        </li>
                        <li class="text">
                            <a href="" class="text-white">About</a>
                        </li>
                        <li class="text">
                            <a href="" class="text-white">Contact</a>
                        </li>
                    </ul>
                </div>
                <?php
                if (!isset($_SESSION['fullName'])) {
                ?>
                    <div class="container grid w-60 gap-6 place-content-center grid-cols-2">
                        <a href="./auth/login.php" class="p-0">
                            <button class="text-white bg-blue-600 rounded hover:bg-blue-400 hover:text-black px-2">
                                Sign In
                            </button>
                        </a>
                        <a href="./auth/signup.php">
                            <button class="text-orange-500 border-orange-500 rounded border hover:bg-orange-500 hover:text-white px-2">
                                Sign Up
                            </button>
                        </a>
                    </div>
                <?php
                } else {
                ?><div class="container w-60 place-content-center flex flex-row relative justify-start">
                        <button onclick="myFunction()" class="bg-blue-600 rounded px-2 py-1 hover:bg-blue-400 text-white hover:text-black dropbtn flex gap-2">
                            <!-- <span class="w-6 h-6 p-0 profile"></span> -->
                            <span class="w-6 h-6">
                                <?php if ($_SESSION['profilePic'] === null or $_SESSION['profilePic'] === '') {
                                ?>
                                    <img src="../picture/svg/circle-user-solid.svg" alt="" class="w-full rounded-full" />
                                <?php
                                } else {
                                ?>
                                    <img src="../../storage/images/profile/<?php echo $_SESSION['profilePic'] ?>" alt="" class="w-full rounded-full" />
                                <?php } ?>
                            </span>
                            <?php
                            echo $_SESSION['fullName'];
                            ?>
                        </button>
                        <div id="myDropdown" class="absolute bg-gray-300 z-10 shadow-lg mt-8 rounded-md grid hidden py-2 dropdown-content">
                            <a href="./notification.php" class="text-black hover:bg-gray-400 w-full pl-4 pr-6 flex gap-3 self-center">
                                <img src="../picture/svg/bell-solid.svg" alt="bell" class="w-4 h-4 mt-1">
                                Notification
                            </a>
                            <a href="" class="text-black hover:bg-gray-400 w-full pl-4 pr-6 flex gap-3 self-center">
                                <img src="../picture/svg/table-list-solid.svg" alt="bell" class="w-4 h-4 mt-1">
                                Dashboard
                            </a>
                            <a href="" class="text-black hover:bg-gray-400 w-full pl-4 pr-6 flex gap-3 self-center">
                                <img src="../picture/svg/gear-solid.svg" alt="bell" class="w-4 h-4 mt-1">
                                Setting
                            </a>
                            <a href="../../app/handler/logout.php" class="text-black hover:bg-gray-400 w-full pl-4 pr-6 flex gap-3 self-center">
                                <img src="../picture/svg/right-from-bracket-solid.svg" alt="bell" class="w-4 h-4 mt-1">
                                Log out
                            </a>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </nav>
    </div>