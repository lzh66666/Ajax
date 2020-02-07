<?php
	// 运算符,流程控制与函数
	echo "<pre>";
	/*
		1.运算符operator
		区别：字符串拼接php中使用.点运算符
			  字符串累加php中使用.=运算符
		例子：
			$num1 = 100;
			$num2 = 10;
			var_dump(($num1==101)&&($num2==10));

		2.流程控制controls
		javascript中
			//forin快速遍历中i代表下标
			var arr = ['aa','bb','cc','dd'];
			for(var i in arr){
				console.log(arr[i]);
			}
			//forin快速遍历中j代表键值
			var obj = { username:'frank', password:'123456' };
			for(var j in obj){
				console.log(obj[j]);
			}
		php中
			$arr = ['aaa','bbb','ccc','ddd'];
			foreach ($arr as $key => $value) {
				echo $key,$value;
			}

		*3.导入inclue与require
		include 'frank.php';
		echo "AAA $frank";

		4.php函数function
			函数内部如果想要使用全局变量，不能直接使用
			需要通过global关键字声明一次才能使用

			$num = 100;
			echo '---- 1.'.$num.'------';
			function func(){
				global $num;
				$num ++;
				echo '---- 2.'.$num.'------';
			}
			func();
			echo '---- 3.'.$num.'------';

	*/

?>