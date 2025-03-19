<?php
session_start(); // Start the session to access session variables
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
header("Location: index.php");
exit(); // Ensure script execution stops after redirection
?>
