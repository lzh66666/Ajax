<?php
// 查询sql语句
	echo "<pre>";
	$con = mysqli_connect('localhost', 'root', '', 'day2db');
	if($con){
		mysqli_query($con, 'set names utf8');
		mysqli_query($con, 'set character_set_client=utf8');
		mysqli_query($con, 'set character_set_results=utf8');

		// $sql = "select userName from userinfolist where password='111111'";
		$sql = "select * from userinfolist where 1";
		$result = $con->query($sql);

		//如果查找结果不为空的话
		if($result->num_rows>0){
			$info = [];
			//通过fetch_assoc()遍历方法，获取$result中每一条数据
			for($i=0; $row=$result->fetch_assoc(); $i++){
				$info[$i] = $row;
			}
			//数据获取成功，此时$info就是所有的具体数据
			print_r($info);
			echo $info[0]['userName'];
			echo $info[0]['password'];
		}

	}else{
		echo '连接失败！';
	}

?>