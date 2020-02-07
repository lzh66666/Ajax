<?php
	// 06pdo预处理语句
	
	
	// (1)prepare & execute
	// echo "<pre>";
	// require_once 'singletonPDO.php';
	// $pdo = singletonPDO::getPdo();
	// $pdo->exec('set names utf8');
	// //半成品sql语句
	// //只能由prepare 预处理语句执行
	// $sql = "insert into userinfolist values(?,?)";
	// $halfPro = $pdo->prepare($sql);
	// //将半成品通过execute方法传入参数，变成成品
	// $result = $halfPro->execute(['xiaoming','666']);
	// var_dump($result);

	// (2)bindColumn
	echo "<pre>";
	require_once 'singletonPDO.php';
	$pdo = singletonPDO::getPdo();
	$pdo->exec('set names utf8');
	
	$sql = "select * from userinfolist where 1";
	$halfPro = $pdo->prepare($sql);
	$halfPro->execute();

	//将结果中的内容绑定在指定变量上
	$halfPro->bindColumn(1, $uname);
	$halfPro->bindColumn(2, $upass);
	
	//读取检索结果
	$info = [];
	//$halfPro->fetch(PDO::FETCH_COLUMN)
	//作用是，遍历结果中的每一条数据，直到最后一条为止
	for($i=0; $halfPro->fetch(PDO::FETCH_COLUMN); $i++){
		$info[$i] = array('userName'=>$uname, 'password'=>$upass);
	}
	print_r($info);

?>