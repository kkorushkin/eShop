<?php 
include '../init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jump-Score-Store</title>
	<link rel="stylesheet" href="css/adminka.css" />
	
</head>
<body>
<a href="../index.php" id="homelink"><img src="../images/logo5.png" /></a><!-- header -->
<hr>
<table id="adm-info">
	<tr>
		<td>
			<?php include ROOT.'/admin/functions/adminformer.inc.php' ;?>
		</td>
		<td id="action-side" rowspan=2><?php include(!$_REQUEST['action']) ? 'tpls/adminpanel.tpl' : 'tpls/'.$_REQUEST['action'].'.tpl'; ?></td>
	</tr>
	<tr id="adm-links">
		<td>
			<a href="?action=todb">add items to db</a><br />
			<a href="?action=fromdb">remove items from db</a><br />
			<a href="?action=reprice">reprice items</a><br />
			<a href=""></a><br />
		</td>
	</tr>
</table>
</body>
</html>
