<?php
include 'check_auth.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <title>Eco-Cyle</title>
</head>

<body class="body min-h-screen font-['Poppins'] bg-gray-100">

    <!-- HEADER -->
    <header class="bg-white text-green-900 sticky top-0 z-50 shadow-md rounded-2xl">
        <section class="max-w-7xl mx-auto p-4 flex justify-between items-center">
            <h1 class="text-4xl font-extrabold font-['Poppins']">
                <div class="flex items-center hover:opacity-70">
                    <img src="img/logo-icon.png" alt="" class="w-24">
                    <a href="../index.html" class=""><span class="text-green-500">Ec</span>o-Cyle</a>
                </div>
            </h1>
            <div>
                <button onclick="showHamburger()" class="text-3xl lg:hidden">
                    ☰
                </button>
                <nav class="hidden lg:block space-x-8 text-xl font-bold" aria-label="main">
                    <a href="" class="hover:opacity-70">Our Goal</a>
                    <a href="" class="hover:opacity-70">About Us</a>

                    <a href="">
                        <button class="p-2 pl-5 pr-5 border-2 bg-green-500 text-white text-xl rounded-xl transition-colors duration-700 transform hover:bg-green-700 hover:text-gray-100 focus:border-4 focus:border-green-300 border-b-8 border-green-900 hover:scale-105">System
                            Administrator</button>
                    </a>
                </nav>
            </div>
        </section>

        <section id="hamburger" class="bg-white w-full rounded-2xl shadow-md shadow-bottom-2xl -mt-5 absolute hidden text-center">
            <nav>
                <div class="">
                    <div class="text-green-900 px-2 pt-2 pb-3 space-y-1 sm:px-3">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-green-200">Home</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-green-200">Our
                            Goal</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-green-200">About
                            Us</a>
                    </div>
                </div>
            </nav>
        </section>

    </header>

    <!-- END HEADER -->

    <main class="max-w-7xl mx-auto">
        <!-- START OF LANDING PAGE -->
        <section class="font-['Poppins'] p-6 ">
            <div>
                <div class="max-w-lg rounded-2xl overflow-hidden shadow-xl m-auto bg-white">
                    <img class="w-60 m-auto" src="img/logo-icon.png" alt="icon-logo    ">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-5 text-center text-green-900">Administrive Login Form</div>

                        <div class="flex flex-col space-y-4 font-semibold">
                            <form action="auth.php" method="POST" class="flex flex-col space-y-4 font-semibold">
                                <div>
                                    <label for="username" class="text-gray-700 font-bold">
                                        Admin Username
                                    </label>
                                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div>
                                    <label for="password" class="text-gray-700 font-bold">
                                        Password
                                    </label>
                                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="m-auto">
                                    <input type="submit" name="submit" id="login" value="Login" class="p-2 px-12 border-2 bg-green-500 text-white text-xl rounded-xl transition-colors duration-700 transform hover:bg-green-700 hover:text-gray-100 focus:border-4 focus:border-green-300 border-b-8 border-green-900 hover:scale-105">
                                    </intput>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END LANDING PAGE -->
    </main>

    <!-- FOOTER -->
    <footer class="bg-green-900 py-4 bottom-0 w-full rounded-lg h-60 shadow-lg mt-10">
        <div class="container mx-auto text-center">
            <p class="text-white text-sm">© 2023 EcoCycle. All rights reserved.</p>
        </div>
    </footer>
    <!-- END FOOTER -->

    <script src="src/hamburger.js"></script>
</body>

</html>