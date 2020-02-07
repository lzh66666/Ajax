<?php

	$username = $_POST['myUname'];
	$userpass = $_POST['myUpass'];
	$success = array('msg'=>'OK');
	//echo 意味着反回给前端数据，echo相当于return的作用
	// echo "<pre>";

	//从数据库中获取所有的用户信息
	$con = mysqli_connect('localhost','root','','day2db');
	if($con){
		mysqli_query($con, 'set names utf8');
		mysqli_query($con, 'set character_set_client=utf8');
		mysqli_query($con, 'set character_set_results=utf8');
		$sql = "select * from userinfolist where 1";
		$result = $con->query($sql);
		
		//解析查询结果
		if($result->num_rows>0){
			$info = [];
			for($i=0; $row=$result->fetch_assoc(); $i++){
				$info[$i] = $row;	
			}
			//得到解析结果数组后，判断用户发来的内容是否存在于数据库中
			$flag = 0;//只要执行了break就变成1，否则一直都是0
			for($j=0; $j<count($info); $j++){
				//判断是否与当前条目的用户名相同
				if($info[$j]['userName'] == $username){
					//如果相同，继续判断是否与当前条目的密码相同
					if($info[$j]['password'] == $userpass){
						//如果还相同，则证明登录成功
						$success['infoCode'] = 0;
						$flag = 1;
						break;
					}
				}
			}
			//如果整个循环结束后，一个条目都不匹配，也证明用户登录失败
			if($flag == 0){
				$success['infoCode'] = 1;
			}
			// print_r($success); php测试输出的内容在正式调用时均需要注释，否则会将php执行中断
		}else{
			$success['infoCode'] = 1;
		}
	}else{
		$success['infoCode'] = 2;//0代表登录成功，1代表登录失败，2代表数据库连接失败 
	}

	//反馈给前端
	echo json_encode($success);
?>