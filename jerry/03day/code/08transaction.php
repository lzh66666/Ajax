<meta charset="utf-8"> <?php
	// 08pdo事务处理transaction方法
	require_once 'singletonPDO.php';
	$pdo = singletonPDO::getPdo();
	$pdo->exec('set names utf8');

	try{
		//开启事务处理
		$pdo->beginTransaction();
		//创建一个修改sql语句
		$sql = "update userinfolist set userName=?,password=? where userName=?";
		$halfPro = $pdo->prepare($sql);
		
		//执行第一条execute语句(第一个事件)
		$halfPro->execute(['franky','333','frank']);
		//执行第二条execute语句(第二个事件)立即中断，改变singletonPDO
		$halfPro->execute(['lileilei','11111']);

		//提交事务
		$pdo->commit();
	}catch(PDOException $e){
		$pdo->rollBack();
		echo '事务处理失败，数据库回滚到事务开始之前的状态，没有受到任何影响';
	}


?>