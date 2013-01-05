<?php
error_reporting(0);
require_once('master.php');
$dsn = array(
	'phptype' 	=> 'mysql',
	'username'	=> 'cciampoli',
	'password'	=> 'cciampoli@123',
	'hostspec'	=> 'localhost',
	'database'	=> 'oop'
);
$db = DB::connect($dsn);
$product1 = ShopProduct::getInstance(1, $db);
$product2 = ShopProduct::getInstance(2, $db);
$writer = new ShopProductWriter();
$writer->addProduct($product1);
$writer->addProduct($product2);
$writer->write();
?>
