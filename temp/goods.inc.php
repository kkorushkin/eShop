<?php
require 'functions/functions.inc.php';
define("CURRENCY","$");
//----------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD'] == "POST" And isset($_POST['search_item'])){
	$search = $_POST['search_item'];
	$query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,img.link
			FROM items i 
			INNER JOIN images img 
			ON i.items_id = img.item_id
			WHERE i.items_name LIKE \"%$search%\"
			GROUP BY i.items_id;";
	$result = getDb("127.0.0.1","root","","eShop",$query,"don't fetch","return");
	
}
//----------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD'] == "GET" AND isset($_GET['items_category'])){
	$orderBy = "i.items_price"; 
	$direct	= "ASC";
	$items_category = abs((int)$_GET['items_category']);
	$items_sub_category = abs((int)$_GET['items_sub_category']);
	switch ($items_sub_category){
		case 0:
			$items_sub_category = "";
			break;
		case 3:
			$items_sub_category = " AND (i.items_sub_category = 1 OR i.items_sub_category = 3)";
			break;
		case 4:
			$items_sub_category = " AND (i.items_sub_category = 1 OR i.items_sub_category = 4)";
			break;
		case 5:
			$items_sub_category = " AND (i.items_sub_category = 2 OR i.items_sub_category = 5)";		
			break;
	}
	$query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,i.items_originlink,img.link
			FROM items i 
			INNER JOIN images img 
			ON i.items_id = img.item_id
			WHERE i.items_category = $items_category $items_sub_category
			GROUP BY i.items_id
			ORDER BY $orderBy $direct;";
	$result = getDb("127.0.0.1","root","","eShop",$query,"don't fetch","return");		
}
include 'tpl/sortoptions.tpl';
while($row = mysqli_fetch_assoc($result)){
	$editPrice = CURRENCY." ".round(($row[items_price] + ($row[items_price]*($row[items_margin]/100))));
	$upperName = strtoupper($row[items_name]);
	$i++; 
	echo<<<HTML
		<div class="shopitem" id="sortshopitem-$i" style="background:url($row[link]); background-repeat:no-repeat; background-size:contain; background-position:left;">
			<a href="view.php?item=$row[items_id]" target="_blank">
				<div id="shopitem_item_name">$upperName</div><br />\n
				<div id="shopitem_item_price">$editPrice</div>\n
				<div id="shopitem_to_basket"><a href="functions/basket.func.php?id=$row[items_id]"><img src="images/hand-kart.png" style="height:20px;" />to basket</a></div>
			</a>
		</div>\n
HTML;
}
?>