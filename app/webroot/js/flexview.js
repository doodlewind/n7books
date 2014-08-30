$(document).ready(function(){
	$("del").each(function(){
		if ($(this).text() == '￥') {
			$(this).remove();			
		}
	})
	$("price").each(function(){
		if ($(this).text() == '￥0起' || $(this).text() == '￥起') {
			$(this).text('暂无售价');
		}
	})
});