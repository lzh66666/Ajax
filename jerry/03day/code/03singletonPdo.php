<?php
	// 单例模式获取pdo对象
	require_once 'singletonPDO.php';
	$pdo1 = singletonPDO::getPdo();
	$pdo2 = singletonPDO::getPdo();
	$pdo3 = singletonPDO::getPdo();

	print_r($pdo1);

?>