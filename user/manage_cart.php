<?php
session_start();
include 'connection.inc.php';
include 'functions.inc.php';
include 'add_to_cart.php';

$pid = get_safe_value($conn, $_POST['pid']);
$qty = get_safe_value($conn, $_POST['qty']);
$type = get_safe_value($conn, $_POST['type']);

$obj = new add_to_cart();

if ($type == 'add') {
    $obj->add_product($pid, $qty);
}
echo $obj->total_product();
?>