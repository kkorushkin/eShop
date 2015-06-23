<?php
require 'functions/functions.inc.php';
define("CURRENCY","$");
function req($param ,$n){
    $idir = new DirectoryIterator($param);
    foreach($idir as $file){
        if ($file->getType() == "dir" And !$file->isDot()){
            //print $file->getPathname().'<br>';
            req($file->getPathname(),$n);
        }else{
            if($file->getFilename() == $n.".class.php"){
                //print $file->getPathname();
                include $file->getPathname();
            }
        }
    }
}
function __autoload($n){
    $param = $_SERVER['DOCUMENT_ROOT'];
    req($param,$n);
}
$singleItem = new Store;
$item_id = $_GET['item'];
$result = $singleItem->getSingleItem($item_id);
?>
<table id="item-info">
	<tr>
		<td  id="item-name"><?=$result[0]['items_name'];?></td>
		<td id="item-price">$<?=round($result[0]['items_price'] +($result[0]['items_price']*($result[0]['items_margin']/100)));?></td>
	</tr>
</table>
<div id="zoomer" style="background-image:url(<?=$result['link'];?>);"></div>
<?php
$i = 0;
?>
<div id="view-small-pics-wrapper">
<?php
$result = $singleItem->getAllItemImages($item_id);
foreach($result as $item){
    $i++;
    $item['link'] = str_replace(" ","-",$item['link']);
    echo "<div class=\"view-small-pics\" id=\"view-small-pics-".$i."\" style=\"background-image:url(".$item['link'].");\"></div>";
}
?>
</div>
<div id="view-big-pics"></div>
<div style="width:100%; clear:both;"></div>
<div id="sotial-network-icons">social network icons</div>