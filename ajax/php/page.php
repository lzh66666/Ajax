<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php页面</title>
	<script>
		
		var num = 123;
		console.log(num);

		var str = "编号为：" + num;
		console.log(str);

		// 字符串中处理单引号和双引号的作用基本相同，自由在处理json格式的数据时必须用双引号
		// 下列json为字符串，obj为对象
		var json = '{"username":"zhangshan","age":"18","sex":"male"}';
		var obj = JSON.parse(json);
		console.log(obj);
	</script>
</head>
<body>
	<div>Welcome to PHP Page</div>
	<?php
		// 所有的PHP相关的代码都要写到这里面
		// echo的作用就是将代码输出到网页中
		// php的变量声明 
		$num = 123;
		// php当中的字符串拼接是.
		// echo '<div>编号为：'.$num.'</div>';
		// 单引号对于其中的变量当做普通的字符串处理
		echo '<div>编号为：$num</div>';
		// 双引号会把其中的变量解析成变量值
		echo "<div>编号为：$num</div>";

		echo "<div>Hello World!</div>";
	 ?>
</body>
</html>