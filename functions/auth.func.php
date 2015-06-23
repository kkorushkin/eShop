<?php
	if($_SERVER['REQUEST_METHOD'] == "POST" And $_POST['admincome'] === "12345"){
		header("Location: /eShop/admin/adminka.php");
	}else{
		header("Refresh: 2; ".getenv('HTTP_REFERER')."");
		echo "паролька не паролька!";
	}

?>