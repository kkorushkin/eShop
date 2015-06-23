<?php 
include 'init.php';
//require ROOT.'/functions/functions.inc.php';
$query1 = "SELECT SUM(`item_quantity`) FROM `basket`;";
$query2 = "SELECT `customer_id` FROM `basket` GROUP BY `customer_id`;";
$link = new mysqli("127.0.0.1","root","","eShop");
$result = $link->query($query1);
$itemscount = $result->fetch_assoc();
$result = $link->query($query2);
$customercount = $result->num_rows;
?>
<div id="adm-summ-informer">mow it's <?=$itemscount['SUM(`item_quantity`)'];?> items in <?=$customercount;?> basket(s)</div>
<?php
$result->close();
$link->close();
?>