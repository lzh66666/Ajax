/**
 * Created by Administrator on 2018/3/20 0020.
 */
/**
 * 顶部导航 通用脚本
 */
(function(){
    $('.header-navi a').each(function () {
        if($(this).html() == document.title){
            $(this).attr('href','').parent().addClass('select-headerA').siblings().removeClass('select-headerA');
        }
    });
}());