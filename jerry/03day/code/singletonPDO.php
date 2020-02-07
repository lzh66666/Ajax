<?php

	//通过单例模式获取pdo对象
	class singletonPDO{
		private static $pdo = null;
		public static function getPdo(){
			if(self::$pdo == null){
				//创建一个
				try{
					self::$pdo = new PDO('mysql:host=localhost;dbname=day2db','root','');
					//下面设置异常捕获状态，专门提供给08transaction用
					self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}catch(PDOException $e){
					echo '连接错误，信息为：'.$e->getMessage();
				}
			}
			return self::$pdo;
		}
	}


?>