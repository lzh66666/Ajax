<?php

	$shengList = ['河北省','黑龙江省','日本省'];
	$shiList = [['保定市','石家庄市'],['大庆市','哈尔滨市','齐齐哈尔市'],['广岛市','长崎市']];
	
	$type = $_GET['type'];
	if($type==0){
		echo json_encode($shengList);
	}else if($type == 1){
		$shengIndex = $_GET['sheng'];
		echo json_encode($shiList[$shengIndex]);		
	}


?>