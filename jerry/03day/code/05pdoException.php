<?php
	// 05pdo异常捕获
	echo "<pre>";
	
	// 第一类异常，数据库连接异常
	// 这种异常直接通过try...catch捕获
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=day2db','root','');

		// 第二类异常，第二种处理方法
		// 设置当数据库操作发生异常的时候，弹出警报，但程序执行不会中断
		//$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		// 第二类异常，第三种处理方法
		// 设置当数据库操作发生异常的时候，进行中断
		// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $err){
		echo 'db 连接失败，原因是：'.$err->getMessage();
	}

	$pdo->exec('set names utf8');
	$sql = "update userinflist set userName='frank',password='333' where userName='franky'";

	if($pdo->exec($sql)){
		echo '操作成功';
	}else{
		// 第二类异常，第一种处理方法(直接通过系统提供的errorCode()和errorInfo()属性实现)
		echo '操作失败';
		// echo $pdo->errorCode();
		// echo $pdo->errorInfo();
	}


?>