<?php

	$username = $_POST['uname'];
	$password = $_POST['upass'];
	$success = array('msg' => 'OK');

	$con = mysqli_connect('localhost','root','','day2db');
	if($con){
		mysqli_query($con, 'set names utf8');
		mysqli_query($con, 'set character_set_client=utf8');
		mysqli_query($con, 'set character_set_results=utf8');
		//
		$sql = "select * from userinfolist where 1";
		$result = $con->query($sql);
		//获取数据库数据
		if($result->num_rows>0){
			$info = [];
			for($i=0; $row=$result->fetch_assoc(); $i++){
				$info[$i] = $row;
			}
		}
		//判断是否登录成功
		$flag = false;//默认false表示登录失败，如果能登录成功，则变为true
		for($j=0; $j<count($info); $j++){
			if($info[$j]['userName'] == $username){
				if($info[$j]['password'] == $password){
					$success['infoCode'] = 0;
					$flag = true;
					break;
				}
			}
		}
		if($flag == false){
			$success['infoCode'] = 1;
		}
	}else{
		$success['infoCode'] = 2;//0代表成功，1代表失败，2代表数据库连接失败
	}
	echo json_encode($success);
?>