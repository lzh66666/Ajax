<?php
	// 数据类型
	echo "<pre>";
	/*
		1.字符串类型
		描述：php中字符串采用单引号或双引号定义
		注意：
			 (1)如果字符串中有容易引起歧义的内容，就是用转义字符\来处理
			 (2)双引号定义的字符串可以对变量内容进行解析，单引号则不行
			 (3)php中字符串拼接是用.点运算符，而不是+加号
		例子：
				$str1 = 'frank say : \'do not sleep and huhuhu!\'';
				var_dump($str1);
				$str2 = '$str1';
				var_dump($str2);
				$str3 = "$str1";
				var_dump($str3);
				$str4 = 'hello';
				$str5 = 'frank';
				$str6 = $str4.$str5;
				var_dump($str6);
				//
				$str7 = 'hello';
				$str7 .= ' world!';
				var_dump($str7);
	*/

	/*
		2.数组Array
	*/

	$arr1 = array('username'=>'frank', 'password'=>'138363057xx');
	$arr2 = ['小明','小红',18,true];

	//var_dump($arr1);
	//var_dump($arr2);
	//echo $arr1; 错误输出方式，应该用print_r()来输出
	//print_r($arr1);
	// print_r($arr2);

	//echo $arr2[1];
	//echo $arr1['username'];

	// echo count($arr1);
	// echo count($arr2);

	echo count($arr2);
	print_r($arr2);
	$arr2[100] = '小芳';

	echo count($arr2);
	print_r($arr2);




?>