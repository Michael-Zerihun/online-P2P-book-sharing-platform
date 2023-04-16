<?php
include './layout/layout.php';
include '../../../app/config/autoloader.admin.php';
?>
<div class="w-full px-20 py-4 relative drop-shadow-2xl h-complete flex">
    <div class="rounded bg-slate-300 px-8 min-h-max w-full flex-grow grid grid-cols-3 py-4 gap-4">
        <div class="col-span-2 gap-4 grid grid-cols-2 py-8 px-4">
            <div class="bg-white rounded-md grid hover:shadow-xl z-10 hover:scale-105 border ">
                <a href="./book.php" class="grid place-content-center gap-4">
                    <div class="grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-users w-12 text-blue-600" viewBox="0 0 640 512">
                            <path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl">Books</h1>
                </a>
            </div>
            <div class="bg-white rounded-md grid hover:shadow-xl z-10 hover:scale-105 border ">
                <a href="./users.php" class="grid place-content-center gap-4">
                    <div class="grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-users w-12 text-blue-600" viewBox="0 0 640 512">
                            <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl">Users</h1>
                </a>
            </div>
            <div class="bg-white rounded-md grid gap-4 hover:shadow-xl z-10 hover:scale-105 border ">
                <a href="./queue.php" class="grid place-content-center gap-4">
                    <div class="grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-users w-12 text-blue-600" viewBox="0 0 640 512">
                            <path d="M360 72a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zM144 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32zM496 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM200 313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-36.3-67.5c1.7-1.7 3.2-3.6 4.3-5.8L264 217.5V272c0 17.7 14.3 32 32 32h48c17.7 0 32-14.3 32-32V217.5l26.9 49.9c1.2 2.2 2.6 4.1 4.3 5.8l-36.3 67.5c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L440 313.5V352c0 17.7 14.3 32 32 32h48c17.7 0 32-14.3 32-32V313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3H486.2c-16.3 0-31.9 4.5-45.4 12.6l-33.6-62.3c-15.3-28.5-45.1-46.3-77.5-46.3H310.2c-32.4 0-62.1 17.8-77.5 46.3l-33.6 62.3c-13.5-8.1-29.1-12.6-45.4-12.6H134.2c-32.4 0-62.1 17.8-77.5 46.3L18.9 340.6c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L88 313.5V352c0 17.7 14.3 32 32 32h48c17.7 0 32-14.3 32-32V313.5z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl">Queues</h1>
                </a>
            </div>
            <div class="bg-white rounded-md grid gap-4 hover:shadow-xl z-10 hover:scale-105 border ">
                <a href="./notification.php" class="grid place-content-center gap-4">
                    <div class="grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-users w-12 text-blue-600" viewBox="0 0 640 512">
                            <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl">Notifications</h1>
                </a>
            </div>
            <div class="bg-white rounded-md grid gap-4 hover:shadow-xl z-10 hover:scale-105 border ">
                <a href="./complain.php" class="grid place-content-center gap-4">
                    <div class="grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-users w-12 text-blue-600" viewBox="0 0 640 512">
                            <path d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32V64 368 480c0 17.7 14.3 32 32 32s32-14.3 32-32V352l64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30V66.1c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48V32z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl">Complains</h1>
                </a>
            </div>
        </div>
        <div class=" grid place-content-center">
            <img src="../../picture/svg/undraw_security_on_re_e491.svg" alt="" class="w-full">
        </div>
    </div>
</div>
<?php
include './layout/footer.php';
