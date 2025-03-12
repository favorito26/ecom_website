<?php
session_start();
unset($_SESSION['ADMIN_LOGIN'], $_SESSION['ADMIN_USERNAME']);
header('location: login.php');
die();
?>