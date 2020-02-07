<?php

	// 05自定义ajax框架实际案例瀑布流
	$dataArr = ['img/i1.jpg','img/i2.jpg','img/i3.jpg','img/i4.jpg','img/i5.jpg','img/i6.jpg','img/i7.jpg','img/i8.jpg','img/i9.jpg','img/i10.jpg','img/i11.jpg','img/i12.jpg','img/i13.jpg','img/i14.jpg','img/i15.jpg'];

	$success = array('msg' => 'OK', 'info' => $dataArr);
	echo json_encode($success);

?>