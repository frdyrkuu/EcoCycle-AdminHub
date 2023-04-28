<?php
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $usr = $conn->query("SELECT username FROM user_admin WHERE 1");
    $usernameValidation = $usr->fetch_assoc()['username'];

    if ($username != $usernameValidation) {

        $stmt = mysqli_prepare($conn, "INSERT INTO `user_admin`(`name`, `username`, `password`, `created_at`) VALUES (?, ?, ?, NOW())");
        mysqli_stmt_bind_param($stmt, "sss", $name, $username, $password);

        mysqli_stmt_execute($stmt);

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header("Location: dashboard.php?success=Account has been created");

        exit();
    } else {

        header("Location: register.php?error=Username has been taken");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCycle | Register</title>
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="dist/header.css">



</head>

<body class="body font-['Poppins'] font-semibold">


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

                    <a href="dashboard.php">
                        <button class="p-2 pl-5 pr-5 border-2 bg-green-500 text-white text-xl rounded-xl transition-colors duration-700 transform hover:bg-green-700 hover:text-gray-100 focus:border-4 focus:border-green-300 border-b-8 border-green-900 hover:scale-105">Home</button>
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

    <main class="max-w-14xl">
        <section class="h-screen ">
            <div class=" m-auto w-full sm:w-1/4 bg-white py-6 p-9 rounded-3xl shadow-2xl sm:mt-14 flex flex-col items-center justify-center">
                <img src="img/logo-icon.png" alt="product1" class="w-1/4 mb-6 rounded-xl sm:w-1/4 m-auto" id="product-img-3">
                <h3 class="font-['Poppins'] font-bold text-3xl text-center text-green-900 px-4" id="product-title-1">
                    Admin Sign Up Form
                </h3>
                <p class="font-['Poppins'] text-gray-600 text-lg mt-3 mx-2 text-center">Create your Administrator <br>
                    Account to have a permission to dashboard.</p>
                <br>
                <div class="">
                    <form action="" method="POST" id="sign-up-form">
                        <label for="first_name" class="block text-lg font-medium text-gray-900">Create
                            Username</label>
                        <input type="text" name="username" id="username" class="font-['Poppins'] bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg block w-full px-2" placeholder="Username" required>

                        <label for="first_name" class="font-['Poppins'] block text-lg mt-5 font-medium text-gray-900 dark:text-white">Create
                            Password</label>
                        <input type="password" name="password" id="password" class="font-['Poppins'] bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg block w-full px-2" placeholder="Password" required>

                        <label for="first_name" class="font-['Poppins'] block text-lg mt-5 font-medium text-gray-900 dark:text-white">Enter
                            Your Fullname</label>
                        <input type="text" name="name" id="name" class="font-['Poppins'] px-2 bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg block w-full" placeholder="Fullname" required>
                        <div class="flex flex-col justify-center items-center my-2">
                            <input type="submit" name="submit" id="login" class="p-2 mt-5 px-12 border-2 bg-green-500 text-white text-xl rounded-xl transition-colors duration-700 transform hover:bg-green-700 hover:text-gray-100 focus:border-4 focus:border-green-300 border-b-8 border-green-900 hover:scale-105" value="Submit"></input>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="src/hamburger.js"></script>
</body>

</html>