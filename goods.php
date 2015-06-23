<!DOCTYPE html>
<html>
<head>
	<title>Jump-Score-Store: Collection</title>
    <meta name="description" content="Jordan Jumpman original sneakers and shoes" />
	<link rel="stylesheet" href="css/main.css" />
    <script type="text/javascript" src="js/jquery/2.1.4/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/sortCollection.js"></script>
</head>
<body>
<?php include 'tpl/user-panel.inc.tpl';?><!-- user panel top -->
<a href="index.php"><?php include 'tpl/header.inc.tpl';?></a><!-- header -->
<div id="wrapper">
    <?php include 'tpl/sortoptions.tpl';?>
    <div id="sortable">
	    <?php require 'goods.inc.php';?><!-- selected items -->
    </div>
</div>
<hr>
<div id="footer"><?=$_SERVER['SERVER_SOFTWARE'];?></div><!-- footer -->
</body>
</html>


