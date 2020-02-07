<?php
	// pdo对象与mysql数据库连接
	echo "<pre>";
	//原生php的mysql操作
	// $con = mysqli_connect('localhost','root','','day2db');
	// if($con){
	// 	mysqli_query($con, 'set names utf8');
	// 	mysqli_query($con, 'set character_set_client=utf8');
	// 	mysqli_query($con, 'set character_set_results=utf8');
	// 	$mysql = "select * from userinfolist where 1";
	// 	$result = $con->query($mysql);
	// 	if($result->num_rows>0){
	// 		$info = [];
	// 		for($i=0; $row=$result->fetch_assoc(); $i++){
	// 			$info[$i] = $row;
	// 		}

	// 		print_r($info);
	// 	}
	// }else{
	// 	echo 'connect db failed';
	// }


	//php的PDO连接数据库
	//说明：pdo对象是一个在页面中不可见内容的对象，这个对象只能靠创建成功与失败来判断连接状态
	//      而无法查看内部的属性和属性值
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=day2db','root','');
		print_r($pdo);
	}catch(PDOException $err){
		echo '出现错误，信息为：'.$err->getMessage();
	}

?>