<div class="w-full flex py-5 px-28 gap-4 ">
    <div class="flex gap-4">
        <label for="sort" class="text-white font-bold grid grid-cols-2 self-center">
            <span class="w-5 mt-1"><svg viewBox="0 0 576 512">
                    <path d="M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3V448c0 17.7 14.3 32 32 32s32-14.3 32-32V146.3l32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 480h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128H544c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32z" />
                </svg>
            </span>
            Sort</label>
        <select name="sort" id="sort" class="rounded">
            <optgroup label="Book Name">
                <option value="a-z">A-Z</option>
                <option value="z-a">Z-A</option>
            </optgroup>
            <optgroup label="Author Name">
                <option value="a-z">A-Z</option>
                <option value="z-a">Z-A</option>
            </optgroup>
            <optgroup label="Year">
                <option value="descending">Descending</option>
                <option value="ascending">Ascending</option>
            </optgroup>
        </select>
        <!-- <a href="" class="text-white font-bold self-center">
            <i class="fa-solid fa-bars-sort"></i>
            Filter</a>
        <a href="" class="text-white font-bold self-center">
            <i class="fa-solid fa-bars-sort"></i>
            Idk</a> -->
    </div>
    <div class="flex bg-white rounded-md pl-2 pt-1">
        <form action="./home.php" method="get">
            <input type="search" class="outline-none text-lg" name="findBook" id="book">
            <button type="submit" class="w-5 h-5 btn-search"></button>
        </form>
    </div>
</div>