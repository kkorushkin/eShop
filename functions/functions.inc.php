<?php
function getDb($host,$user,$pass,$db,$query,$fetch="fetch",$return="return"){
	$link = new mysqli($host,$user,$pass,$db);
	$result = $link->query($query) or die(mysqli_error($link));
	if($fetch == "fetch")$result = mysqli_fetch_assoc($result);
	if($return == "return") return $result;
	$link->close();
}

?>