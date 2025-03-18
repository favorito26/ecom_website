<?php

$conn = mysqli_connect("localhost","root","m260103c","database_ecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT']);
define('SITE_PATH', 'http://localhost:3000/');
define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH.'../media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH.'../media/product/');
?>