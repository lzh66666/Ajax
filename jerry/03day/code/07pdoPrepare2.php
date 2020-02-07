<?php
	// 07pdo补充bindValue方法
	
	// $userName = $_POST['uname'];
	// $password = $_POST['upass'];

	echo "<pre>";
	require_once 'singletonPDO.php';
	$pdo = singletonPDO::getPdo();
	$pdo->exec('set names utf8');
	
	$sql = "insert into userinfolist values(?,?)";
	$halfPro = $pdo->prepare($sql);

	//在prepare()方法和execute()方法之间，对sql语句中的？传值
	//提供了一种更灵活的方式，来编辑sql语句
	$halfPro->bindValue(1, 'xiaohong');
	$halfPro->bindValue(2, '777');

	//习惯上execute()方法不传参，仅代表执行作用
	echo $halfPro->execute();
?>