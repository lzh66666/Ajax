/*顶部轮播*/
    // var swiper_hd = new Swiper('.swiper-hd',{
    //     pagination:'.hd-page',
    //     onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
    //         swiperAnimateCache(swiper); //隐藏动画元素
    //         swiperAnimate(swiper); //初始化完成开始动画
    //     },
    //     onSlideChangeEnd: function(swiper){
    //         swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
    //     }
    // });
    /*乐章轮播*/
    var swiper_yz = new Swiper('.swiper-yz',{
        pagination:'.yz-page'
    });
    /*听说脚本*/
    (function(){
        var imgArr = ['img/header-ts-img1.png','img/header-ts-img2.png',
                      'img/header-ts-img3.png','img/header-ts-img4.png',
                      'img/header-ts-img5.png'];
        var $items = $('.ts-container .ts-container-item');
        var $texts = $('.ts-container .ts-container-text');
        $items.each(function () {
            $(this).css('background','url("'+imgArr[$(this).index()]+'")');
        });
        //
        $items.mouseenter(function () {
            $texts.eq($(this).index()).stop(true).animate({width:240},300);
        }).mouseleave(function () {
            $texts.eq($(this).index()).stop(true).animate({width:0},300);
        });
    }());
    /*乐趣轮播*/
    var swiper_lq = new Swiper('.swiper-lq',{
        pagination:'.lq-page'
    });
    /*聊聊轮播*/
    var swiper_ll = new Swiper('.swiper-ll',{
        pagination:'.ll-page'
    });
    (function (){
        $('.swiper-ll .oneItem-img').html("<p>爱写啥</p><p>写啥</p>");
    }());
    /*游记轮播*/
    var swiper_yj = new Swiper('.swiper-yj',{
        pagination:'.yj-page'
    });
    (function (){
        $('.swiper-yj li').hover(function () {
            $(this).find('.yj-text').stop(true).animate({left:0},300);
        }, function () {
            $(this).find('.yj-text').stop(true).animate({left:-285},300);
        });
    }());
    /*照片墙*/
    // (function (){
    //     var $tds = $('.imgWall td');
    //     var oldimgName = '';
    //     var imgArr = ['img/header-imgWall-img1.png','img/header-imgWall-img2.png',
    //         'img/header-imgWall-img3.png','img/header-imgWall-img4.png',
    //         'img/header-imgWall-img5.png','img/header-imgWall-img6.png'];
    //     $tds.each(function () {
    //         $(this).css('background','url("'+imgArr[getRandom(0,imgArr.length)]+'")');
    //     });
    //     $tds.mouseenter(function () {
    //         oldimgName = $(this).css('background');
    //         $(this).css('background','url("img/header-imgWall-img7.png")');
    //     }).mouseleave(function () {
    //         $(this).css('background',oldimgName);
    //     });

    // }());


  