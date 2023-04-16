<?php
include './layout/layout.php';
include '../../../app/handler/admin/user.show.php';
?>

<div class="w-full px-20 py-4 relative drop-shadow-2xl h-complete">
    <div class="rounded bg-slate-300 px-8 w-full h-full grid grid-cols-3 py-4 gap-4">
        <div class="col-span-2 gap-4 py-8 px-4 overflow-scroll h-full grid grid-cols-2 custom-scroll">
            <?php foreach ($users as $user) {
            ?>
                <div class="grid grid-cols-12 bg-white max-h-20 rounded-md hover:drop-shadow-lg">
                    <div class=" col-span-3">
                        <img src="../../../storage/images/profile/<?php echo ($user[3] === '') ? 'noProfile.png': $user[3] ?>" alt="" class=" max-h-20 rounded-l-md">
                    </div>
                    <div class=" col-span-9 pr-4 pl-3">
                        <div class="h1 text-lg font-bold"><?php echo $user[1]?></div>
                        <hr>
                        <div class="grid grid-cols-8">
                            <div class="col-span-7">
                                <p class="font-semibold"><?php echo $user[2]?></p>
                                <span class=" text-xs text-gray-500"><?php echo date('d-m-Y', strtotime($user[4]))?></span>
                            </div>
                            <div class="flex col-span-1 gap-4 align-middle justify-around">
                                <a href="" class="flex align-middle"><button class="w-5">
                                        <img src="../../picture/svg/trash-can-solid.svg" alt="delete" class="d">
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            
        </div>
        <div class="grid place-content-center">
            <img src="../../picture/svg/undraw_team_re_0bfe.svg" alt="" class="w-full">
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
