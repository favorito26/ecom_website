<?php 
include 'connection.inc.php';
include 'functions.inc.php';
$name=get_safe_value($conn, $_POST['name']);
$email=get_safe_value($conn, $_POST['email']);
$mobile=get_safe_value($conn, $_POST['mobile']);
$password=get_safe_value($conn, $_POST['password']);
$added_on=date('Y-m-d H:i:s');
$check_user=mysqli_num_rows(mysqli_query($conn, "select * from users where email = '$email'"));
if($check_user>0){
    echo "email_present";
}else{
    $insert_sql="INSERT INTO users(name, email, mobile, password, added_on) VALUES('$name', '$email', '$mobile', '$password', '$added_on')"; 

mysqli_query($conn, $insert_sql);
}
?>