<?php 
	// create by frank on 2018/02/22 02:37
	// paginationTool php file
	
	// $con = mysqli_connect('localhost','root','','lmp');
	// if($con){
	// 	mysqli_query($con, 'set names utf8');
	// 	mysqli_query($con, 'set character_set_client=utf8');
	// 	mysqli_query($con, 'set character_set_results=utf8');

		

	// 	for($i=3; $i<101;$i++){
	// 		$sql = "insert into yzalldatalist values('resource/touxiang.png','frank','这是一个标题".$i."','校园','这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容','199','299')";
	// 		$con->query($sql);
	// 	}
	// }else{
	// 	echo "failed";
	// }
	$success = array('msg'=>'OK');
	// $infoArr = [
	// 	'数据001','数据002','数据003','数据004','数据005',
	// 	'数据006','数据007','数据008','数据009','数据010',
	// 	'数据011','数据012','数据013','数据014','数据015',
	// 	'数据016','数据017','数据018','数据019','数据020',
	// 	'数据021','数据022','数据023','数据024','数据025',
	// 	'数据026','数据027','数据028','数据029','数据030',
	// 	'数据031','数据032','数据033','数据034','数据035',
	// 	'数据036','数据037','数据038','数据039','数据040',
	// 	'数据041','数据042','数据043','数据044','数据045',
	// 	'数据046','数据047','数据048','数据049','数据050',
	// 	'数据051','数据052','数据053','数据054','数据055',
	// 	'数据056','数据057','数据058','数据059','数据060',
	// 	'数据061','数据062','数据063','数据064','数据065',
	// 	'数据066','数据067','数据068','数据069','数据070',
	// 	'数据071','数据072','数据073','数据074','数据075',
	// 	'数据076','数据077','数据078','数据079','数据080',
	// 	'数据081','数据082','数据083','数据084','数据085',
	// 	'数据086','数据087','数据088','数据089','数据090',
	// 	'数据091','数据092','数据093','数据094','数据095',
	// 	'数据096','数据097','数据098','数据099','数据100'
	// ];
	//去数据库获取真数据
	$con = mysqli_connect('localhost','root','','lmp');
	if($con){
		mysqli_query($con, 'set names utf8');
		mysqli_query($con, 'set character_set_client=utf8');
		mysqli_query($con, 'set character_set_results=utf8');
		$sql = 'select * from yzalldatalist where 1';
		$result = $con->query($sql);
		//
		$info = [];
		for($i=0; $row=$result->fetch_assoc(); $i++){
			$info[$i] = $row;
		}
	}

	//根据请求内容做返回数据处理
	if(!$_GET){
		//如果无参请求，就返回总数据长度
		$success['dataLength'] = count($info);
	}else{
		//如果有参数，就返回指定页码的15条数据
		$result = array_slice($info, ($_GET['page']-1)*15, 15);
		$success['code'] = $_GET['page'];
		$success['list'] = $result;
	}
	echo json_encode($success);
?>