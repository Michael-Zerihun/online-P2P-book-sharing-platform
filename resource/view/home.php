<?php
include './layout/layout.php';
include './layout/toolbar.php';
include '../../app/handler/SearchBook.form.php';
?>

<?php
$itemLocation = 0;
if ($books === false) {
?>
    <div class="grid w-full px-28 py-4">
        <div class=" bg-slate-100 flex rounded-lg py-8">
            <img src="../picture/svg/undraw_empty_re_opql.svg" alt="" class="w-2/4">
            <h1 class="text-6xl text-slate-700 self-center -ml-12">Book is not found...</h1>
        </div>
    </div>
<?php
} else { ?>
    <div class="w-full px-20 pt-10 pb-16 grid grid-cols-6 gap-6 relative">
        <?php
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
        }
    }
    ?>
    </div>
    <?php
    include './layout/footer.php';
