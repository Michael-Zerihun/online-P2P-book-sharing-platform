<?php
include './layout/layout.php'

?>
<div class="container grid grid-cols-1 px-12 pt-24 lg:pl-52 lg:pt-40">
    <div class="lg:w-2/5">
        <h1 class="text-6xl text-green-300 drop-shadow-2xl shadow-white">
            Online Library
        </h1>
        <p class="lg:text-emerald-300 pt-4 drop-shadow-lg bg-white bg-opacity-10 lg:bg-opacity-0 shadow-white text-violet-900 font-semibold lg:font-normal">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Voluptatem, odit! Maiores magnam officia culpa sapiente!
        </p>
        <!-- ../../app/handler/SearchBook.form.php -->
        <form action="./home.php" method="get">
            <div class="container gap-0 flex pt-10 pr-3">
                <label for="findBook" class="hidden"> Book Search </label>
                <input type="text" name="findBook" id="book" class="rounded-l-md w-full py-2 focus:outline-none px-4 focus:border-b-2 border-red-400 font-bold" autocomplete="off" />
                <input type="submit" value="Search" class="bg-cyan-500 px-4 -ml-1 w-24 py-2 rounded-r-md" />
            </div>
        </form>
    </div>
</div>
<?php
include './layout/footer.php';
