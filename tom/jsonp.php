<?php 
	// echo 123;
	// $cb = $_GET['callback'];//默认
	$cb = $_GET['cb'];
	// echo $cb.'('.'"hello"'.')';
	$arr = array("username"=>"zhangsan","password"=>"123456");
	echo $cb.'('.json_encode($arr).')';
 ?>