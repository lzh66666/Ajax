/**
 * create by frank in 2018/06/29
 * frankAjax 自封装的ajax框架
 *
 * paramsObj json类型参数
 * post required params：
 *   type    ：请求类型(string)
 * 	 url     ：请求地址(string)
 *   data    ：请求参数(json)
 *   success ：请求回调(function)
 * 
 * eg:
 *   window.frankAjax({
 *		type:'get',
 *		url:'lesson2_ajaxEncapsulation.php',
 *		data:{
 *			username:'test-frank',
 *			password:'test-123456'
 *		},
 *		success:function (res){
 *			console.log(res);
 *		}
 *	});
 *
 *  tips1: get无参请求，参数data可以不写！
 */
 
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
})();