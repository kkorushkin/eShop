<?php
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
$collection = new Store;
define("CURRENCY","$");
if($_SERVER['REQUEST_METHOD'] == "POST" And isset($_POST['search_item'])){
    $search = strip_tags($_POST['search_item']);
    $result = $collection->getSearchResult($search);
}
if($_SERVER['REQUEST_METHOD'] == "GET" AND isset($_GET['items_category'])){
	$items_category = abs((int)$_GET['items_category']);
	$items_sub_category = abs((int)$_GET['items_sub_category']);
    $result = $collection->getCollection($items_category, $items_sub_category);
}
foreach($result as $item) {
    $editPrice = CURRENCY . " " . round(($item[items_price] + ($item[items_price] * ($item[items_margin] / 100))));
    $upperName = strtoupper($item[items_name]);
    $i++;
    echo <<<HTML
		<div class="shopitem" data-order="$i" id="sortitem" style="background:url($item[link]); background-repeat:no-repeat; background-size:contain; background-position:left;">
			<a href="view.php?item=$item[items_id]" target="_blank">
				<div id="shopitem_item_name">$upperName</div><br />\n
				<div id="shopitem_item_price">$editPrice</div>\n
			</a>
		</div>\n
HTML;
}
?>