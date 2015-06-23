<?php
if($_SERVER['REQUEST_METHOD'] == "POST" And isset($_POST['submit_sort'])){
	$orderBy = $_POST['sort_attr1'];
	$direct = $_POST['sort_attr2'];
	$items_category = $_GET['items_category'];
	if(!isset($items_category)){
		$whereCondition = "";
	}else{
		$whereCondition = "WHERE i.items_category = $items_category";
	}
	$query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,items_originlink,img.link
			FROM items i 
			INNER JOIN images img 
			ON i.items_id = img.item_id
			$whereCondition
			GROUP BY i.items_id
			ORDER BY $orderBy $direct;";
	$result = getDb("127.0.0.1","root","","eShop",$query,"dot'n fetch","return");
}
?>