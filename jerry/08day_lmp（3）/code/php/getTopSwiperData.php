<?php
	$success = array('msg'=>'OK');
	//匹配数据部分
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=lmp','root','');
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	$pdo->exec('set names utf8');
	$sql = 'select * from topswiperdatalist where 1';
	//因为需要从数据库中读取数据，所以采用pdo的预处理语句
	$result = $pdo->prepare($sql);
	$result->execute();
	//数据绑定，便于在循环遍历中读取查询结果
	$result->bindColumn(1, $imgUrl);
	$result->bindColumn(2, $dataTitle);
	$result->bindColumn(3, $dataContent);
	//通过预处理语句得到的$result就包含了所有的结果
	$info = [];
	for($i=0; $result->fetch(PDO::FETCH_COLUMN); $i++){
		$info[$i] = array('imgUrl'=>$imgUrl, 'dataTitle'=>$dataTitle, 'dataContent'=>$dataContent);
	}
	//将索引到的数据放入$success中并进行返回
	$success['swiperInfo'] = $info;
	echo json_encode($success);
?>