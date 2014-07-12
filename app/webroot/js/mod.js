$(document).ready(function(){
	setTimeout(function(){
		$("img").each(function(){
			$(this).removeAttr("data-src");
			$(this).removeAttr("alt");
		})
	},0);
});