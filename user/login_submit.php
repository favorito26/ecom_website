<?php
session_start(); // REQUIRED to use sessions

include 'connection.inc.php';
include 'functions.inc.php';

$email = get_safe_value($conn, $_POST['email']);
$password = get_safe_value($conn, $_POST['password']);

$res = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
$check_user = mysqli_num_rows($res);

if ($check_user > 0) {
    $row = mysqli_fetch_assoc($res); 
    
    if ($password == $row['password']) {
        $_SESSION['USER_LOGIN'] = 'yes';
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME'] = $row['name'];
        echo "right";
    } else {
        echo "wrong"; // Incorrect password
    }
} else {
    echo "wrong"; // User not found
}
?>
