<?php
ob_start();
if($_SERVER['REQUEST_METHOD'] == "GET" And isset($_GET['id'])){
	addToBasket();
	getBasket();
	header("Location:$_SERVER[HTTP_REFERER]");
	exit;
}
//---------------------------------------------------------------------------------------------------
function addToBasket(){
	$item_id = abs((int)$_GET['id']);
	$customer_id = $_COOKIE['PHPSESSID'];
	$link = new mysqli("127.0.0.1","root","","eShop");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$query = "INSERT INTO `basket`(`customer_id`,`item_id`,`item_quantity`)
					VALUES (\"$customer_id\", $item_id, 1);";
		$link->query($query) or die(mysqli_error($link));
		$link->close();
	}
}
function getBasket(){
	$customer_id = $_COOKIE['PHPSESSID'];
	$link = new mysqli("127.0.0.1","root","","eShop");
	$query = "SELECT `id`, `customer_id`, `item_id`, `item_quantity` FROM `basket`
				WHERE `customer_id` = \"$customer_id\";";
	$result = $link->query($query) or die(mysqli_error($link));
	echo "Now in your basket $result->num_rows items";
	$link->close();
}
function itemList(){
	$query = "SELECT `id`,`customer_id`,`item_id`,`quantity` FROM basket;";
	$result = getDb("127.0.0.1","root","","eShop",$query,"fetch","return");
}
//---------------------------------------------------------------------------------------------------
ob_end_flush();
?>