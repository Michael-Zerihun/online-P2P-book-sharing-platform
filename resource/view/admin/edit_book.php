<?php
include './layout/layout.php';
include '../../../app/handler/admin/edit_book.update.php';
?>
<script src="../js/form_change.js" defer></script>
<div class="w-full px-20 py-4 relative drop-shadow-2xl h-complete">
    <div class="rounded bg-slate-300 px-8 w-full h-full grid grid-cols-3 py-4 gap-4">
        <div class="col-span-2 gap-4 py-8 px-4 overflow-scroll h-full grid custom-scroll">
            <div class="bg-white h-full p-4 rounded-md">
                <form action="./edit_book.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="bookId" id="bookId" hidden value="<?php echo $bookInfo['bookId'] ?>">
                    <div class="grid grid-cols-12">
                        <div class="grid gap-4 col-span-3 justify-center px-2">
                            <label for="image" class="bg-green-400 rounded-md p-1">
                                <img src="../../../storage/images/books/lowRes/<?php echo $bookInfo['image'] ?>" alt="" class=" w-full max-h-56" id="preview">
                                <div class="font-bold w-full text-center py-1 text-gray-900">Upload</div>
                            </label>
                            <input type="file" name="image" id="image" hidden onchange="imageUpload()">
                        </div>
                        <div class="grid col-span-9 gap-4 pl-4">
                            <div class="grid grid-rows-3 grid-flow-col py-4 pr-16">
                                <div class="w-full">
                                    <label for="bName" class="font-bold text-gray-900">Book Name</label><br>
                                    <input type="text" name="bookName" id="bName" value="<?php echo $bookInfo['name'] ?>" class="border-b bg-slate-200 border-blue-400 rounded-sm outline-blue-600 w-full p-1">
                                </div>
                                <div class="w-full">
                                    <label for="owner" class="font-bold text-gray-900">Owner Name</label><br>
                                    <input type="text" name="owner" id="owner" value="<?php echo $bookInfo['owner'] ?>" class="border-b bg-slate-200 border-blue-400 rounded-sm outline-blue-600 w-full p-1">
                                </div>
                                <div class="w-full">
                                    <label for="genre" class="font-bold text-gray-900">Genre</label><br>
                                    <input type="text" name="genre" id="genre" value="<?php echo $bookInfo['genre'] ?>" class="border-b bg-slate-200 border-blue-400 rounded-sm outline-blue-600 w-full p-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid pl-4 pr-8 gap-4 py-2">
                        <div class="grid gap-4">
                            <div class="grid">
                                <label for="shortDisc" class="font-bold text-gray-900">Brief description</label>
                                <textarea name="shortDisc" id="shortDisc" cols="30" rows="5" class="border border-blue-400 rounded-md outline-blue-600 custom-scroll p-2"><?php echo $bookInfo['shortDescription'] ?></textarea>
                            </div>
                            <div class="grid">
                                <label for="longDisc" class="font-bold text-gray-900">Summary</label>
                                <textarea name="longDisc" id="longDisc" cols="10" rows="10" class="border border-blue-400 rounded-md outline-blue-600 custom-scroll p-2"><?php echo $bookInfo['longDescription'] ?></textarea>
                            </div>
                        </div>
                        <div class="flex gap-4 justify-end">
                            <input type="reset" name="reset" value="Reset form" class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded h-8 px-4">
                            <a href="./book.php?b=0" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white rounded h-8 px-4 pt-1">Cancel</a>
                            <input type="submit" name="submit" value="Save" class="border border-blue-500 bg-blue-500 hover:bg-blue-600 text-white rounded h-8 px-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid place-content-center">
            <img src="../../picture/svg/undraw_text_field_htlv.svg" alt="" class="w-full">
        </div>
        <div class="prompt bg-gray-900 opacity-50 absolute top-0 bottom-0 right-0 left-0 grid place-content-center hidden">
            <div class="bg-white -mt-16 rounded-md px-8 pb-8">
                <div class="grid place-content-center pt-4">
                    <div class="grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 svg-cancel" viewBox="0 0 512 512">
                            <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                        </svg>
                    </div>
                    <h1 class="text-lg font-bold text-orange-500">Warning</h1>
                </div>
                <div class="grid place-content-center">
                    <h1 class="text-lg font-bold">Are you sure you want to delete:</h1>
                    <div class="grid place-content-center">
                        <p class="text-lg font-bold">The Zahir</p>
                    </div>
                </div>
                <div class="flex justify-around pt-8">
                    <div class="flex gap-8">
                        <button class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white rounded-md px-4">Delete</button>
                        <button class="border border-green-500 bg-green-500 text-white hover:bg-green-400 rounded-md px-4">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include './layout/footer.php';
