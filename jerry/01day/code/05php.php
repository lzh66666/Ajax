<meta charset="utf-8">　<?php
	// 数据类型(3)
	echo "<pre>";
	
		//1.对象Object
			class Phone{
				public $phoneType = 'HuaWei';
				function show(){
					echo '华为手机是特好用的手机!';
				}
			}
			$myPhone = new Phone;
			print_r($myPhone);
			//
			$myPhone->show();
			echo $myPhone->phoneType;

		//2.空值类型null
			$temp = null;
			var_dump($temp);

		/*3.什么是类？&什么是对象？&类和对象有什么关系？
			类：是一些事物公有特征的抽象描述
			对象：类中的某一个具体存在的个体
			类是范畴，对象是其中的个体*/
	
?>