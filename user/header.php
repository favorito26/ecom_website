<?php include 'connection.inc.php' ?>
<?php include 'functions.inc.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-md h-12 w-full flex justify-between items-center z-20 fixed top-0">
        <h1 class="ml-4 md:ml-28">Best Store</h1>

        <!-- Hamburger Button -->
        <div class="hamburger mr-4 md:hidden">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>

        <!-- Navigation Links -->
        <div class="nav-links shadow-md md:shadow-none">
            <a class="hover:text-gray-600" href="index.php">HOME</a>
            <a class="hover:text-gray-600" href="products.php">PRODUCTS</a>
            <a class="hover:text-gray-600" href="contact.php">Contact Us</a>
            <div class="nav-right md:hidden flex mr-10 gap-5 text-center items-center justify-center">
                <a href="logout.php" class="text-gray-700 hover:text-gray-900"><i class="fa-solid fa-right-from-bracket"></i></a>
                <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="profile.php" class="text-gray-700 hover:text-gray-900 font-bold"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>

        <div class="nav-right mr-10 hidden md:flex gap-5">
            <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fa-solid fa-cart-shopping"></i></a>
            <div class="profile-container">
                <a href="login.php">Login/register</a>
                <!-- <button class="text-gray-700 hover:text-gray-900 font-bold cursor-pointer"><i class="fa-solid fa-user"></i></button> -->
                <!-- <div class="dropdown flex-col bg-blue-950 text-white">
                    <div class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div> -->
            </div>
        </div>

    </nav>

    <script>
        // JavaScript for hamburger menu functionality
        const hamburger = document.querySelector(".hamburger");
        const navLinks = document.querySelector(".nav-links");

        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navLinks.classList.toggle("active");
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll(".nav-links a").forEach(link => {
            link.addEventListener("click", () => {
                hamburger.classList.remove("active");
                navLinks.classList.remove("active");
            });
        });
    </script>