<?php
include './layout/layout.php';
include './layout/toolbar.php';
include '../../app/handler/ViewBook.show.php';
?>
<div class="w-full px-20 pb-16 relative drop-shadow-2xl">
    <div class="w-full grid grid-cols-3 gap-4 bg-white rounded-2xl">
        <div class="rounded-2xl">
            <img src="../../storage/images/books/highRes/<?php echo $bookInfo['image'] ?>" alt="" srcset="" class="w-full rounded-l-2xl" />
        </div>
        <div class="col-span-2 px-4 flex flex-col bg-slate-50 rounded-r-2xl">
            <div class="py-4">
                <h1 class="text-3xl pb-4 font-semibold"><?php echo $bookInfo['name'] ?></h1>
                <hr />
            </div>

            <div class="pr-12 pl-4 flex-grow flex">
                <div class="flex-grow grid">
                    <div class="row-span-4">
                        <p class="text-justify">
                            <?php echo $bookInfo['longDescription'] ?>
                        </p>
                    </div>
                    <div class="row-span-1 grid grid-rows-2 grid-flow-col text-sm">
                        <p class="font-semibold">
                            Owner:
                            <span class="text-gray-700"><?php echo $bookInfo['owner'] ?></span>
                        </p>
                        <p class="font-semibold">
                            Genre:
                            <span class="text-gray-700"><?php echo $bookInfo['genre'] ?></span>
                        </p>
                    </div>
                    <div class="action row-span-1 gap-8 grid grid-cols-6 pb-12 pt-8">
                        <a href="./borrow.php?book=<?php echo $bookInfo['bookId']; ?>">
                            <button class="px-4 border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white rounded h-8">
                                Borrow
                            </button>
                        </a>
                        <button class="px-4 border border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded h-8">
                            Done
                        </button>
                        <button class="px-4 border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded h-8">
                            Gave to
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full px-20 pt-10 pb-16 grid grid-cols-6 gap-8 relative">
    <?php
    $itemLocation = 0;
    foreach ($books as $book) {
        ?>
            <a href="./view-book.php?book=<?php echo $book[0] ?>">
                <div class="rounded-md bg-slate-50 relative flex  transform hover:-mt-4 hover:z-10 hover:w-mul hover:card-expand overflow-hidden 
            <?php
            if ($itemLocation != 0) {
                if ((($itemLocation % 6) == 4) or (($itemLocation % 6) == 5)) {
                    echo 'hover:right-side-card';
                } else {
                    echo 'transition-all';
                }
            }
            ?>">
                    <img src="../../storage/images/books/lowRes/<?php echo $book[3]; ?>" alt="book1" srcset="" class="w-full rounded-md" />

                    <div class="max-h-64 overflow-hidden py-6 px-5">
                        <h2 class="font-bold text-lg"><?php echo $book[1] ?></h2>
                        <hr />
                        <p class="pt-3 text-sm">
                            <?php echo $book[2] ?>
                        </p>
                    </div>
                </div>

            </a>

    <?php
            $itemLocation += 1;
        }?>
</div>

<?php
include './layout/footer.php';
