<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/final.css" />
    <script src="../js/script.js" defer></script>
    <title>Login</title>
</head>

<body>
    <div class="sm:grid place-content-center h-screen bg-image-wave">
        <div class="w-full h-full pt-8 px-8 grid sm:px-6 sm:pt-6 sm:pb-10 bg-red-4000 bg-white sm:rounded-md shadow-lg">
            <div class="sm:hidden bg-image-login row-span-3"></div>
            <div class="grid place-content-center pt-2">
                <h1 class="text-2xl font-bold">Sign Up</h1>
            </div>
            <form action="../../../app/handler/Signup.form.php" method="post">
                <div class="pt-4">
                    <label for="fullName" class="font-semibold">Full Name</label>
                    <hr />
                </div>
                <div id="nameDiv" class="pt-1 flex border-b-2 border-gray-400 gap-1 px-1">
                    <input type="text" name="fullName" id="name" class="text-lg py-1 pr-4 w-full font-semibold outline-none" />
                    <div class="w-8 h-8 -mb-1 btn-user mt-1 rounded-sm"></div>
                </div>
                <div class="pt-4">
                    <label for="email" class="font-semibold">Email</label>
                    <hr />
                </div>
                <div id="emailDiv" class="pt-1 flex border-b-2 border-gray-400 gap-1 px-1">
                    <input type="email" name="email" id="email" class="text-lg py-1 pr-4 w-full font-semibold outline-none" />
                    <div class="w-8 h-8 -mb-1 btn-email mt-1 rounded-sm"></div>
                </div>
                <div class="pt-3">
                    <label for="password" class="font-semibold">Password</label>
                    <hr />
                </div>
                <div id="passDiv" class="pt-1 flex border-b-2 border-gray-400 gap-1 px-1">
                    <input type="password" name="password" id="password" class="text-lg py-1 pr-4 w-full font-semibold outline-none" />
                    <div id="toggle" class="w-8 h-8 -mb-1 btn-show mt-1 rounded-sm"></div>
                </div>

                <div class="pt-3">
                    <label for="rePass" class="font-semibold">Repeat Password</label>
                    <hr />
                </div>
                <div id="rePassDiv" class="pt-1 flex border-b-2 border-gray-400 gap-1 px-1">
                    <input type="password" name="rePass" id="rePass" class="text-lg py-1 pr-4 w-full font-semibold outline-none" />
                    <div id="reToggle" class="w-8 h-8 -mb-1 btn-show mt-1 rounded-sm"></div>
                </div>
                <div class="pt-8 pb-1 flex w-full justify-end">
                    <input type="submit" value="Sign Up" class="rounded-full ml-1 text-lg py-1 px-6 w-full font-semibold bg-blue-500 shadow-sm" />
                </div>
                <div class="py-6 grid place-content-center">
                    <p class="text">
                        Already a member?
                        <a href="./login.php" class="text-blue-500 underline text-sm">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>