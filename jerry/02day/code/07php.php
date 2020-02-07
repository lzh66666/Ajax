<?php
	// 连接mysql数据库代码结构
	echo "<pre>";
	//创建db连接
	//php操作数据库的第一步骤
	$con = mysqli_connect('localhost', 'root', '', 'day2db');
	//保险
	if($con){
		//如果数据库连接成功，在进行下面的操作
		//数据库连接成功之后，添加辅助设置，避免出现乱码结构
		mysqli_query($con, 'set names utf8');
		mysqli_query($con, 'set character_set_client=utf8');
		mysqli_query($con, 'set character_set_results=utf8');


		//创建sql语句
		$sql = '假设这是一条sql语句';
		//让db连接，执行sql语句，并获得执行结果
		$result = $con->query($sql);

	}else{
		echo '连接失败！';
	}

?>