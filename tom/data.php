<?php 
	$arr = array("username"=>"zhangsan","password"=>"123456");
	//01
	// echo 132;
	// 02
	// echo 'var data = 123;';
	// echo 'var data ='.json_encode($arr);
	// 03
	// echo 'foo(123);';
	// echo 'foo('.json_encode($arr).')';
	// 04
	// echo $cb.json_encode($arr).')';
	// 04
	$cb = $_GET['_cb'];
	$uname = $_GET['username'];
	$pw = $_GET['password'];

	echo $cb. '('. ' {"username" : " '.$uname.' " , "password" : " '.$pw. ' "} '. ')';
    // echo '{"username":"zhangsan","password":"123456"}';
 ?>