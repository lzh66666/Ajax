<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>基础语法测试</title>
	<script>
		
		var arr = [123,456];
		console.log(arr[0]);
		console.log(arr[1]);
		
		var arr1 = new Array(789,111);
		console.log(arr1[0]);
		console.log(arr1[1]);
	</script>
</head>
<body>
	<div>测试内容</div>
	<div>
		<?php 
			// $arr = array(1,2,3,4,5);
			$arr = array("hello","hi");
			print_r($arr);//Array ( [0] => hello [1] => hi )
			echo "<br>";
			echo $arr[0];
			echo "<br>";
			echo $arr[1];

			echo "<br>";
			$arr1 = array("usename" => "zhangshan","age" => "23", "sex" => "male");
			print_r($arr1);

			echo "<br>";
			var_dump($arr1);
		 ?>
	</div>
</body>
</html>