<?php
// 插入删除和修改sql语句
	echo "<pre>";
	$con = mysqli_connect('localhost','root','','day2db');
	if($con){
		mysqli_query($con, 'set names utf8');
		mysqli_query($con, 'set character_set_client=utf8');
		mysqli_query($con, 'set character_set_results=utf8');

		//插入sql语句
		// $sql = "insert into userinfolist(userName, password) values('hanmeimei','555')";
		// $sql = "insert into userinfolist values('xiaoming','666')";
		
		//修改sql语句
		// $sql = "update userinfolist set userName='XM',password='666666' where userName='xiaoming'";

		//删除sql语句
		$sql = "delete from userinfolist where userName='XM'";

		$result = $con->query($sql);
		var_dump($result);

	}else{
		echo 'db connect failed!';
	}


?>