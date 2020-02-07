<?php
	echo "<pre>";
	// 类和对象
	/*
		1.php中类的概念
		描述：php中类使用class关键字声明
		语法：class 类名 { 类结构 }
		说明：
			  (1)类名命名规则等同于变量名，但一般首字母大写
			  (2)类结构由常量、属性和方法构成
		例子：
				class Peo{
					public $pname = 'tempPname';
					function showSelf(){
						echo 'hello i am a people';
					}
				}

		2.php中对象的概念
		描述：php中对象通过new关键字+类名获取，并且类必须在实例化对象之前被创建
		语法：$变量 = new 类名();
		说明：类名后面的小括号写不写都行。
		例子：
				class Peo{
					public $pname = 'tempPname';
					function showSelf(){
						echo 'hello i am a people';
					}
				}
				$frank = new Peo;
				print_r($frank);

				echo $frank->pname;
				$frank->showSelf();

		3.php属性关键字
		描述：属性关键字是用来说明类中的属性能够使用的范畴的说明关键字
		语法：    
				class 类名{
				    属性关键词 $变量名(属性名) = 属性值;
				    属性关键词 function 方法名 (参数1,参数2,…){  方法内容代码;  }
			    }
		说明：
		   		a.属性中的变量可以初始化，但初始化的值必须是常数。
		   			$pname = 3;//正确
		   			$pname = 1+2;//错误
		   		b.类的属性和方法如果没有写明类型关键词，则都默认是公有
					public：被定义为公有的类成员可以在任何地方被访问。
					protect：被定义为受保护的类成员则可以被其自身以及其子类和父类访问。
					private：被定义为私有的类成员则只能被其定义所在的类访问。
				c.在类的成员方法中，可以用->来访问非静态属性，其中->称为对象运算符
 	*/

	class Peo{
		public $pname = 'tempPname';
		public function showSelf(){
			echo 'hello i am a people';
		}

		private $psecret = 'peo secret';
		public function getPsecret(){
			echo $this->psecret;
		}
	}
	$frank = new Peo;
	// print_r($frank);
	// echo $frank->pname;
	// $frank->showSelf();
	$frank->getPsecret();

?>