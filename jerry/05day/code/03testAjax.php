<?php
	// 03测试自定义ajax框架
	
	$success = array('msg'=>'ok');

	if($_POST){
		$success['info'] = $_POST;
	}else{
		$success['info'] = $_GET;
		$success['imgSrc'] = 'img/i1.jpg';
	}

	echo json_encode($success);

?>