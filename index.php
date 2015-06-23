<?php
include 'init.php';
require ROOT.'/functions/functions.inc.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jump-Score-Store</title>
    <meta name="description" content="Jordan Jumpman original sneakers, shoes, clothes and gear">
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/category-item.css" />
</head>
<body>
<?php include 'tpl/user-panel.inc.tpl';?><!-- top user panel -->
<?php include 'tpl/header.inc.tpl';?><!-- header -->
<div id="wrapper">
	<?php include 'category_menu.inc.php';?><!-- main categories -->
</div>
<hr>
<div id="footer"><?=$_SERVER['SERVER_SOFTWARE'];?></div><!-- footer -->
</body>
</html>