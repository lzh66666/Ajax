<?php
	echo "<pre>";
	// 属性关键字与继承
	/*
		1.php类常量与静态变量
		类常量：const声明，不能修改，::双冒号调用
		静态变量：static声明，能修改，::双冒号调用，只执行一次
		例子：
			class Car{
				const carType = 'fute';
				static $carPrice = 123456;
			}
			echo Car::carType;
			echo Car::$carPrice;
			//类常量不能修改
			// Car::carType = 'bens';
			// echo Car::carType;
			// echo Car::$carPrice;
			//静态变量声明语句只执行一次，却能被修改
			Car::$carPrice+=100000;
			echo Car::$carPrice;
			$myCar = new Car;
			echo Car::$carPrice;

		2.php中类的构造函数
			php中每一个类内部，都拥有一个和类名完全相同的方法
			这个方法称为构造函数
			而php中这个方法的存在，正是javascript中构造函数的由来

		3.
	*/

	
