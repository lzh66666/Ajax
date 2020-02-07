<?php

	$username = $_POST['myUname'];
	$userpass = $_POST['myUpass'];
	$success = array('msg'=>'OK');


	//从数据库中获取所有的用户信息
	//循环筛选判断

	//约定：账户名必须是frank，密码必须是123456
	if($username=='frank' && $userpass=='123456'){
		$success['infoCode'] = 1;//约定infoCode代表登录状态，0位登录失败，1为登录成功 
	}else{
		$success['infoCode'] = 0;
	}

	//反馈给前端
	echo json_encode($success);
?>