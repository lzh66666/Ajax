<?php

	/*
		(0)$_POST这个内置对象，表示接收到的前端发送过来的post请求数据包
		(1)$_GET这个内置对象，表示接收到的前端发送过来的get请求数据包
		(2)echo 代表返回前端指定数据
		(3)json_encode(对象),来将数组或对象等复杂值转换成json格式
	*/

	//get请求无参
	//php中构建了一个数组结构
	// $successArr = array('msg'=>'OK', 'info'=>'frank de phone hao is 13836305xxx');
	//通过echo和json_encode方法将这个数组转换成json，并返回到前端
	// echo json_encode($successArr);


	//get请求带参
	//php中构建了一个数组结构
	// $successArr = array('msg'=>'OK', 'info'=>$_GET);
	//通过echo和json_encode方法将这个数组转换成json，并返回到前端
	// echo json_encode($successArr);


	//post请求
	$successArr = array('msg'=>'OK', 'info'=>$_POST);
	//通过echo和json_encode方法将这个数组转换成json，并返回到前端
	echo json_encode($successArr);


?>