<?php
	// 04pdo实现mysql增删改操作
	echo "<pre>";
	require_once 'singletonPDO.php';
	$pdo = singletonPDO::getPdo();
	$pdo->exec('set names utf8');
	 
	// pdo增删改sql语句
	// $sql = "insert into userinfolist values('xiaoming','666')";
	// $sql = "delete from userinfolist where userName='xiaoming'";
	// $sql = "update userinfolist set userName='frank',password='333' where userName='franky'";
	// if($pdo->exec($sql)){
	// 	echo '操作成功';
	// }else{
	// 	echo '操作失败';
	// }

	// pdo查询sql语句========查询需要预处理
	$sql = "select * from userinfolist where 1";
	$result = $pdo->exec($sql);

	var_dump($result);

?>