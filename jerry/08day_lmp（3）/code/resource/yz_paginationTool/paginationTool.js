/*
* create by frank on 2018/02/22 02:38
* paginationTool javascript file
*/
$(function(){  
    //个人定制开始，规定一个页面只能加载15条数据
    var numPerPage = 15;
    //先要获取一共多少数据，向后台发送请求
    $.get('resource/yz_paginationTool/paginationTool.php',{},function(dataLength){
        dataLength = JSON.parse(dataLength).dataLength;
        var pageCount = Math.ceil(dataLength/numPerPage);//得到页数，然后动态增加分页器
        inserHtml(pageCount,1);
        bindEvent(pageCount);
        //当页面绘制完成后，加载第一页的数据
        getData(1);
    });
    // 默认测试
    // var pageCount=8;
    // inserHtml(pageCount,1);
    // bindEvent(pageCount);

    /*
        绘制页面的
        page表示一共有多少页
        current默认加载第几页
    */
    function inserHtml(page,current){
        var obj = $(".ts-page");
        obj.empty();
        if(current > 1){
            obj.append('<span class="tspage-start">首页</span>');
            obj.append('<span class="tspage-before">上一页</span>');
        }else{
            obj.remove('.tspage-start');
            obj.append('<span class="tspage-before disable">上一页</span>');
        }
        if(current>3 && current <= page && page>5){
            obj.append('<span class="tspage-ell">...</span>');
        }
        var start = current-2, end= current+2; //中间显示5个
        if(start >1 && current < 4||current == 1){
            end++; //前面会没有省略号。
        }
        if(current > page-2 && current <= page){
            start--; //后面的省略号消失
        }
        for(;start<=end;start++){
            if(start<=page && start >=1){
                if(start != current){
                    obj.append('<span class="page">'+start+'</span>');
                }else{
                    obj.append('<span class="page on">'+start+'</span>');
                }
            }
        }
        if(current+2<page && current >=1 && page>4){
            obj.append('<span class="tspage-ell">...</span>');
        }
        if(current<page){
            obj.append('<span class="tspage-after">下一页</span>');
            obj.append('<span class="tspage-end">尾页</span>');
        }else{
            obj.remove('.tspage-end');
            obj.append('<span class="tspage-after disable">下一页</span>');
        }
    }
    /*
        给分页器工具绑定事件监听
        page表示需要给多少个页面添加事件监听
    */
    function bindEvent(page){
        var obj = $(".ts-page");
        obj.on('click','.page',function(){
            console.log(page);
            var currentPage = parseInt($(this).text());
            inserHtml(currentPage,page);
            inserHtml(page,currentPage);
            //接下来就是获取后台传来数据的ajax函数+数据适配
            getData(currentPage);
        });
        obj.on('click','.tspage-before',function(){
            var currentPage = parseInt(obj.children('.on').text());
            if(currentPage>1){
                inserHtml(page,currentPage-1);
                //接下来就是获取后台传来数据的ajax函数+数据适配
                getData(currentPage-1);
            }

        });
        obj.on('click','.tspage-after',function(){
            var currentPage = parseInt(obj.children('.on').text());
            if(currentPage<page){
                inserHtml(page,currentPage+1);
                //接下来就是获取后台传来数据的ajax函数+数据适配
                getData(currentPage+1);
            }
        });
        obj.on('click','.tspage-start',function(){
            inserHtml(page,1);
            //接下来就是获取后台传来数据的ajax函数+数据适配
            getData(1);
        });
        obj.on('click','.tspage-end',function(){
            inserHtml(page,page);
            //接下来就是获取后台传来数据的ajax函数+数据适配
            getData(page);
        });
    }

    // 根据选择的页码数处理数据
    function getData(num){
        $.get('resource/yz_paginationTool/paginationTool.php?page='+num, function(data){
            var allDataArr = JSON.parse(data).list;
            console.log(allDataArr);
            //根据数据，将元素创建至页面当中
            var outDiv = document.querySelector('.out');
            if(!outDiv){
                //如果页面中没有outdiv，创建一个
                outDiv = document.createElement('div');
                outDiv.className = 'out';
                outDiv.style.cssText = 'position:relative; margin-left:5%;margin-top:20px;margin-bottom:1500px;';
                document.body.appendChild(outDiv);
                //创建outdiv后，根据数据，构建inDivs
                
            }else{
                //如果已经存在outDiv，那就变更outdiv里面的内容
                outDiv.innerHTML = '';//因为这个else进入意味着，页面中已经有之前的数据

            }
            
            for(var i=0; i<allDataArr.length; i++){
                var inDiv = document.createElement('div');
                inDiv.className = 'in';
                inDiv.style.cssText = 'float:left; width:280px; border:1px solid black; margin-right:20px;;';
                //内容...
                var neirongStr = "<img src='"+allDataArr[i].headimgurl+"'>" 
                + "<div class='boxx'><h3>" + allDataArr[i].sectiontitle + "</h3>" + "<span>" + allDataArr[i].sectionauthor
                + "</span></div><div class='dtype'>" + allDataArr[i].sectiontype + "</div><p>"
                + allDataArr[i].sectioncontent + "</p>";
                inDiv.innerHTML = neirongStr;
                //构建瀑布流
                
                outDiv.appendChild(inDiv);
            }
            
            var inDivs = document.querySelectorAll('.in');
            var num = 4;
            var heightArr = [];
            var mm = 0;
            for(var i=0; i<inDivs.length; i++){
                if(i<num){
                    heightArr.push(inDivs[i].offsetHeight);
                }else{
                    inDivs[i].style.position = 'absolute';
                    minHeight = Math.min.apply(null, heightArr);
                    minIndex = heightArr.indexOf(minHeight);
                    inDivs[i].style.top = minHeight+ 2*(i+1) +'px';
                    inDivs[i].style.left = inDivs[minIndex].offsetLeft+'px';
                    heightArr[minIndex] += inDivs[i].offsetHeight;
                    mm = heightArr[minIndex];
                }
            }
            console.log(mm);
            var tsPage = document.querySelector('.ts-page');
            tsPage.style.top = mm + 300 + 'px';
        });
    }
});