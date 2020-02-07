<meta charset="utf-8"> <?php
	// 单例模式
	/*
		self: self在php的类内部使用，表示当前类本身
			  比如在下面的类中
			  self 等价于 richestMan
	*/
	echo "<pre>";
	class richestMan{
		//创建单例类中的唯一单例对象
		private static $richestPeople = null;
		//创建单例方法，用来在全局中获取唯一单例对象
		public static function findRichestMan(){
			//如果这个人不存在，就创建一个最富有的人
			if(self::$richestPeople == null){
				self::$richestPeople = new self();
				self::$richestPeople -> pname = '最富有的人';
				echo '==================';
			}
			//如果存在，那么就不用创建，而是直接把这个人返回就可以了
			return self::$richestPeople;
		}
		//公有属性，当对象创建的时候，用来证明对象的身份
		public $pname = '';
	}

	$richMan1 = richestMan::findRichestMan();
	$richMan2 = richestMan::findRichestMan();
	print_r($richMan1);
	print_r($richMan2);
?>