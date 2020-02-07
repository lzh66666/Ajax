<?php
	
	// 06ajax请求的跨域问题与解决方案
	// $success = array('msg'=>'OK');
	// echo json_encode($success);

	
	//准备get请求的返回数据
	$tempData = array('msg'=>'cross ok');
	//获取前端跨域发来的回调success方法
	$callback = $_GET['callback'];
	//将返回数据构建为【函数调用】的js语法，并直接返回
	echo $callback."(".json_encode($tempData).")";

?>