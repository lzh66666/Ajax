<?php
	//登录请求的php文件
	//获取用户从前端发来的信息
	$username = $_POST['uname'];
	$password = $_POST['upass'];
	$success = array('msg'=>'OK');
	
	//连接数据库并获取数据库中信息
	$con = mysqli_connect('localhost','root','','lmp');
	if($con){
		mysqli_query($con, 'set names utf8');
		mysqli_query($con, 'set character_set_client=utf8');
		mysqli_query($con, 'set character_set_results=utf8');
		$sql = 'select * from loginuserinfolist where 1';
		$result = $con->query($sql);
		//读取数据库中用户数据信息
		if($result->num_rows>0){
			$info = [];
			for($i=0; $row=$result->fetch_assoc(); $i++){
				$info[$i] = $row;
			}
			//判断用户发送来的用户名和密码，是否在数据库中有对应信息
			//标识变量，标识用户是否登录成功，默认为false表示登录失败
			$flag = false;
			for($j=0; $j<count($info); $j++){
				if($info[$j]['username'] == $username){
					if($info[$j]['password'] == $password){
						$success['infoCode'] = 0;
						$success['showUserName'] = $username;//如果是新字段信息，将新的字段对应值返回
						$flag = true;
						break;
					}
				}
			}
			//当循环结束后，判断$flag值，如果为true意为登录成功
			if(!$flag){
				$success['infoCode'] = 1;
			}
		}else{
			$success['infoCode'] = 3;
		}
	}else{
		$success['infoCode'] = 2;//0是成功，1是失败，2是数据库连接失败, 3数据库为空
	}
	echo json_encode($success);
?>