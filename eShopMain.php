<?php
define("CURRENCY","$");
//
if(!isset($_POST['submit_sort']) And $_SERVER['REQUEST_METHOD'] != "POST" Or $_POST['categories'] == "0"){
	$orderBy = "i.items_name"; 
	$direct	= "ASC";
	$query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,items_originlink,img.link
			FROM items i 
			INNER JOIN images img 
			ON i.items_id = img.item_id
			ORDER BY $orderBy $direct";
	$result = getDb("127.0.0.1","root","","eShop",$query,"don't fetch","return");
}else{
	$orderBy = $_POST['sort_attr1'];
	$direct = $_POST['sort_attr2'];
	$categoryId = $_POST['categories'];
	$query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,items_originlink,img.link
			FROM items i 
			INNER JOIN images img 
			ON i.items_id = img.item_id
			ORDER BY $orderBy $direct";
	$result = getDb("127.0.0.1","root","","eShop",$query,"dot'n fetch","return");
	$query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,items_originlink,img.link
			FROM items i 
			INNER JOIN images img 
			ON i.items_id = img.item_id
			WHERE i.items_category = $categoryId
			ORDER BY $orderBy $direct";
	$result = getDb("127.0.0.1","root","","eShop",$query,"dot'n fetch","return");
}	
include 'sortoptions.inc.php';
while($row = mysqli_fetch_assoc($result)){
	echo "<div class=\"shopitem\" style=\"background:url('".$row['link']."'); background-repeat:no-repeat;
				; background-size:70%; 	background-position:left;\">
				<div id=\"shopitem_item_name\">"
					.strtoupper($row['items_name']).
				"</div><br />\n";
		echo	"<div id=\"shopitem_item_price\">"
					.CURRENCY." ".round(($row['items_price'] + ($row['items_price']*($row['items_margin']/100)))).
				"</div>
				<div id=\"shopitem_more\">
					<a href=\"\"> more...</a>
				</div>
				<div id=\"shopitem_origin_link\">
					<a href=\"".$row['items_originlink']."\" target=\"_blank\">origin</a>
				</div>
				<br />\n
				<div id=\"shopitem_to_bascket\">
					<a href=\"functions/bascket.func.php?name=".$row['items_id']."\">
						<img src=\"images/hand-kart.png\" style=\"height:20px;\">to bascket</a>
				</div>
			</div>\n";
}
?>

