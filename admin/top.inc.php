<?php
require('connection.inc.php');
require('functions.inc.php');
if (!isset($_SESSION['ADMIN_LOGIN']) || $_SESSION['ADMIN_LOGIN'] !== 'yes') {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    <title>Dashboard</title>
</head>
<body class="bg-gray-800">
    <nav class="bg-white h-12 w-full flex justify-between items-center z-20">
        <h1 class="ml-28">Best Store</h1>
        <div class="mr-10">
            <a href="#" class="text-gray-700 hover:text-gray-900">Cart (0)</a>
            <a href="logout.php" class="text-gray-700 hover:text-gray-900 font-bold">Log out</a>
        </div>
    </nav>

    <div class="flex">
        <button id="toggleNavbar" class="absolute top-1 left-4 p-2 bg-blue-500 text-white rounded-lg z-50 transition-transform duration-300">
            ☰
        </button>
        <nav id="navbar" class="bg-white w-48 h-screen shadow-md transform -translate-x-full z-30 transition-transform duration-300">
            <div class="p-6">

            </div>
            <ul class="mt-6">
                <li class="px-6 py-2 hover:bg-gray-100">
                    <a href="categories.php" class="text-gray-700 hover:text-gray-900">Categories Master</a>
                </li>
                <li class="px-6 py-2 hover:bg-gray-100">
                    <a href="product.php" class="text-gray-700 hover:text-gray-900">Product master</a>
                </li>
                <li class="px-6 py-2 hover:bg-gray-100">
                    <a href="order.php" class="text-gray-700 hover:text-gray-900">Order Master</a>
                </li>
                <li class="px-6 py-2 hover:bg-gray-100">
                    <a href="users.php" class="text-gray-700 hover:text-gray-900">User Master</a>
                </li>
                <li class="px-6 py-2 hover:bg-gray-100">
                    <a href="contact_us.php" class="text-gray-700 hover:text-gray-900">Contact Us</a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        const toggleButton = document.getElementById('toggleNavbar');
        const navbar = document.getElementById('navbar');
        toggleButton.addEventListener('click', () => {
            navbar.classList.toggle('-translate-x-full');
            navbar.classList.toggle('translate-x-0');
        });
    </script>

