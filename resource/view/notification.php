<?php

use Controller\BookController;
use Controller\UserController;

include './layout/layout.php';
include '../../app/handler/Notification.show.php';
?>

<div class="w-full px-20 py-16 relative drop-shadow-2xl h-complete flex">
    <div class="rounded bg-slate-50 px-12 min-h-max w-full flex-grow">
        <?php if (!$isThereNotification) { ?>
            <div class="h-full flex relative">
                <img src="../picture/svg/undraw_tree_swing_re_pqee.svg" alt="" class="w-3/4 h-full ">
                <p class="text-4xl h-full -ml-12 text-gray-500 grid place-content-center">No notification</p>
            </div>
        <?php } else { ?>
            <div class="py-12 h-full">
                <div class="h-full overflow-scroll custom-scroll gap-4 flex flex-col">
                    <?php
                    $user = new UserController();
                    $book = new BookController();
                    $now = date_create(date("Y-m-d H:i:s"));
                    if (count($notification) > 1) {
                        foreach ($notification as $notify) {
                    ?>
                            <div class="w-full border grid grid-cols-12 rounded-md shadow-md">
                                <div class=" col-1 pr-8">
                                    <img src="../../storage/images/books/lowRes/<?php
                                                                                echo $book->getBookImage($notify[4])['image']
                                                                                ?>" alt="" class="w-full rounded-l-md">
                                </div>
                                <div class="txt col-span-8">
                                    <div class="flex gap-4 ">
                                        <div class="grid place-content-center py-1">
                                            <img src="../picture/square_profile.jpg" alt="" class="w-6 h-6 rounded-full">
                                        </div>
                                        <div class="flex">
                                            <h1 class="text-lg font-bold self-center">
                                                <?php
                                                echo $user->showUserName($notify[3])['fullName'];
                                                ?>
                                            </h1>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="pt-1 ">
                                        <p class="font-semibold">
                                            <?php
                                            echo $notify[1];
                                            ?>
                                        </p>
                                    </div>
                                    <div class="max-h-min">
                                        <span class="text-sm text-gray-700 ">
                                            <?php
                                            $dateIssued = date_create($notify[8]);
                                            $diff = date_diff($dateIssued, $now)->format("%R%a");
                                            echo abs((int)$diff);
                                            ?> days ago
                                        </span>
                                    </div>
                                </div>
                                <div class="col-span-3 grid place-content-center max-h-min ">
                                    <div class="flex gap-8 h-8 content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-accept" viewBox="0 0 512 512">
                                            <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-cancel" viewBox="0 0 512 512">
                                            <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM184 232H328c13.3 0 24 10.7 24 24s-10.7 24-24 24H184c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-delete" viewBox="0 0 448 512">
                                            <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="w-full border grid grid-cols-12 rounded-md shadow-md">
                            <div class=" col-1 pr-8">
                                <img src="../../storage/images/books/lowRes/<?php
                                                                            echo $book->getBookImage($notification[0][4])['image']
                                                                            ?>" alt="" class="w-full rounded-l-md">
                            </div>
                            <div class="txt col-span-8">
                                <div class="flex gap-4 ">
                                    <div class="grid place-content-center py-1">
                                        <img src="../picture/square_profile.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </div>
                                    <div class="flex">
                                        <h1 class="text-lg font-bold self-center">
                                            <?php
                                            echo $user->showUserName($notification[0][3])['fullName'];
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                                <hr>
                                <div class="pt-1 ">
                                    <p class="font-semibold">
                                        <?php
                                        echo $notification[0][1];
                                        ?>
                                    </p>
                                </div>
                                <div class="max-h-min">
                                    <span class="text-sm text-gray-700 ">
                                        <?php
                                        $dateIssued = date_create($notification[0][8]);
                                        $diff = date_diff($dateIssued, $now)->format("%R%a");
                                        echo abs((int)$diff);
                                        ?> days ago
                                    </span>
                                </div>
                            </div>
                            <div class="col-span-3 grid place-content-center max-h-min ">
                                <div class="flex gap-8 h-8 content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-accept" viewBox="0 0 512 512">
                                        <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-cancel" viewBox="0 0 512 512">
                                        <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM184 232H328c13.3 0 24 10.7 24 24s-10.7 24-24 24H184c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-delete" viewBox="0 0 448 512">
                                        <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
include './layout/footer.php';
