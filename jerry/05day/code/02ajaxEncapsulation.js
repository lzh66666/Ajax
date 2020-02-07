//构建自己的ajax框架，
	//约定1：参数模仿jq的格式，也是一个json
	//       json中必要字段有：
	//       type请求类型、url请求地址、data请求参数、success请求回调
	// function frankAjax(paramsObj){
	// 	(1)先处理paramsObj参数，把这个json格式的参数转换成必要的格式
	// 	  a.如果是get请求，将参数拼接到url后面
	// 	      {...}->[...]->join()->url+join()
	// 	  b.如果是post请求，则构建formData参数对象
	// 	      formData.append(..., ...);

	// 	(2)准备xhr对象，然后实现onreadystatechange，准备发送请求
	// 	   xhr.onreadystatechange = function (){...};

	// 	(3)准备open()
	// 	   xhr.open(..., ..., true);

	// 	(4)准备send()
	// 	   if(paramsObj.type == 'get'){  xhr.send(null);  }
	// 	   else if(paramsObj.type == 'post'){  xhr.send(formData);  }
	// }

// 02封装自定义ajax框架

(function (){
	function frankAjax(paramsObj){
		//处理参数
		if(paramsObj.type.toLowerCase() == 'get'){
			var arr = [];
			for(var pro in paramsObj.data){
				var str = pro + '=' + paramsObj.data[pro];
				arr.push(str);
			}
			var canshuStr = arr.join('&');
			//拼接到url后面
			paramsObj.url += paramsObj.url.indexOf('?')==-1
			?'?'+canshuStr
			:'&'+canshuStr;
		}else if(paramsObj.type.toLowerCase() == 'post'){
			var formData = new FormData();
			for(var pro in paramsObj.data){
				formData.append(pro, paramsObj.data[pro]);
			}
		}else{
			console.log('请求类型错误');
		}
		//准备xhr
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function (){
			if(xhr.readyState == 4){
				if(xhr.status == 200){
					//当请求回来后，调用success字段
					paramsObj.success(JSON.parse(xhr.responseText));
				}
			}
		};
		//预定url地址
		xhr.open(paramsObj.type, paramsObj.url, true);
		//发送请求
		if(paramsObj.type.toLowerCase() == 'get'){
			xhr.send(null);
		}else if(paramsObj.type.toLowerCase() == 'post'){
			xhr.send(formData);
		}else{
			console.log('请求类型错误');
		}
	}

	//通过IIFE将框架文件包裹
	//并通过window对象进行绑定
	window.frankAjax = frankAjax;
}())

	