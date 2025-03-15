<?php 
include 'connection.inc.php';
include 'functions.inc.php';
$name=get_safe_value($conn, $_POST['name']);
$email=get_safe_value($conn, $_POST['email']);
$mobile=get_safe_value($conn, $_POST['mobile']);
$comment=get_safe_value($conn, $_POST['comment']);
$added_on=date('Y-m-d H:i:s');

$insert_sql="INSERT INTO contact_us(name, email, mobile, comment, added_on) VALUES('$name', '$email', '$mobile', '$comment', '$added_on')"; 

mysqli_query($conn, $insert_sql);
echo "thank you";
?>
