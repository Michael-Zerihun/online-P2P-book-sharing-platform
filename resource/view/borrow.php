<?php
include './layout/layout.php';
include './layout/toolbar.php';
include '../../app/handler/Borrow.show.php';
?>
<div class="w-full px-20 relative">
    <div class="styleHolder hidden"></div>
    <div class="w-11/12 grid grid-cols-3 gap-4 px-20 py-10 bg-white rounded-2xl">
        <div class="rounded-2xl">
            <img src="../../storage/images/books/highRes/<?php echo $bookInfo['image'] ?>" alt="" srcset="" class="w-full rounded-2xl border-2 image-max-height" />
        </div>
        <div class="col-span-2 px-4 flex flex-col rounded-r-2xl">
            <div class="py-4 row-span-55">
                <h1 class="text-3xl pb-4 font-semibold"><?php echo $bookInfo['name'] ?></h1>
                <hr />
            </div>
            <div class="pr-12 pl-4 flex-grow flex">
                <div class="flex-grow grid">
                    <div class="row-span-4 gap-4 grid grid-flow-col grid-rows-3">
                        <p class="py-2 <?php if ($isAvailable) {
                                            echo 'bg-green-300 ';
                                        } else {
                                            echo 'bg-orange-300 ';
                                        } ?>self-center w-2/3 flex gap-4 pl-4 rounded">
                            <img src="../picture/svg/book-solid.svg" alt="book" class="w-4" />
                            <?php echo $availability ?>
                        </p>
                        <p class="py-2 <?php if (!$isBookLimitReached) {
                                            echo 'bg-green-300 ';
                                        } else {
                                            echo 'bg-orange-300 ';
                                        } ?> self-center w-2/3 flex pl-4 gap-4 rounded">
                            <?php if (!$isBookLimitReached) { ?>
                                <img src="../picture/svg/get-pocket.svg" alt="" class="w-4" />
                                You can current borrow <?php echo $remainingBorrowingBookCount; ?> more books
                            <?php
                            } else { ?>
                                <img src="../picture/svg/triangle-exclamation-solid.svg" alt="" class="w-4" />
                                Borrow limit has been reached
                            <?php } ?>
                        </p>
                        <form action="" method="post">
                            <div class="block ">
                                <div class="gap-4 flex w-3/5">
                                    <label for="days" class="font-semibold">Days</label>
                                    <input type="number" name="days" id="days" class="rounded border-2 border-blue-400 
                                    pl-2" min="1" max="10" required />
                                </div>
                                <i class="text-sm text-gray-600">You can only hold a book for maximum 10
                                    days at once
                                </i>
                            </div>
                    </div>
                    <div class="row-span-1 grid grid-rows-2 grid-flow-col text-sm">
                        <p class="font-semibold">
                            Owner:
                            <span class="text-gray-700"><?php echo $bookInfo['owner'] ?></span>
                        </p>
                        <p class="font-semibold">
                            Holder:
                            <span class="text-gray-700"><?php echo $bookHolder['fullName'] ?></span>
                        </p>
                    </div>
                    <input type="text" name="borrowBook" id="borrowBook" value="
                        <?php echo $bookInfo['name'] ?>|<?php echo $bookId ?>|
                        <?php echo $bookHolder['userId'] ?>|<?php echo $bookHolder['fullName'] ?>|0|
                        <?php echo $_SESSION['userId'] ?>|<?php echo $_SESSION['fullName'] ?>" hidden>
                    <div class="action row-span-1 gap-8 flex pb-12 pt-8">
                        <?php
                        if ((int)$bookHolder['userId'] === (int)$_SESSION['userId']) {
                        ?>
                            <a href="./home.php">
                                <button class="px-4 border border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded h-8">
                                    Release Book
                                </button>
                            </a>
                        <?php
                        } elseif ($actionArea == 0) {
                        ?>
                            <button type="submit" class="px-4 border border-blue-500 text-blue-500
                        hover:bg-blue-500 hover:text-white rounded h-8 disabled:bg-slate-400
                        disabled:text-gray-700" <?php if ($isBookLimitReached or !$isAvailable) {
                                                    echo 'disabled ';
                                                }
                                                ?>>Send Request
                            </button>
                        <?php
                        } elseif ($actionArea == 1) {
                        ?>
                            <div class="px-4 bg-purple-400 self-center py-1 rounded-md">
                                <p class="font">You are already in queue</p>
                            </div>
                        <?php
                        } elseif ($actionArea == 2) {
                        ?>
                            <div class="px-4 bg-purple-400 self-center py-1 rounded-md">
                                <p class="font">Collect book from holder</p>
                            </div>
                        <?php

                        } elseif ($actionArea == 3) {
                        ?>
                            <button type="submit" class="px-4 border border-blue-500 text-blue-500
                        hover:bg-blue-500 hover:text-white rounded h-8 disabled:bg-slate-400
                        disabled:text-gray-700" <?php if ($isBookLimitReached or !$isAvailable) {
                                                    echo 'disabled ';
                                                }
                                                ?>>Take Book
                            </button>
                        <?php
                        } else {
                        ?>
                            <button type="submit" class="px-4 border border-blue-500 text-blue-500
                        hover:bg-blue-500 hover:text-white rounded h-8 disabled:bg-slate-400
                        disabled:text-gray-700" <?php if ($isBookLimitReached or !$isAvailable) {
                                                    echo 'disabled ';
                                                }
                                                ?>>Enter Queue
                            </button>
                        <?php
                        }

                        ?>
                        </form>
                        <a href="./home.php">
                            <button class="px-4 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white rounded h-8">
                                Cancel
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include './layout/footer.php';
