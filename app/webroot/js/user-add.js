$(document).ready(function(){

	$(':input').change(function(){
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var username = $('#UserUsername').val();
		var email = $('#UserEmail').val();
		var mobile = $('#UserMobile').val();
		var password = $('#UserPassword').val();
		var agree = $('#agree');
		var button = $('#UserSubmit');
		
		if (mobile.length == '11' 
			&& password.length >= 6 
			&& password.length <= 16 
			&& username.length > 0 
			&& username.length <= 10
			&& mobile.length <= 16 
			&& regex.test(email)
			&& agree.prop('checked') == true
		) {
			button.removeAttr("disabled");
			button.val("注册");
		}
		else {
			button.attr("disabled", "true");
			if (agree.prop('checked') == true) {
				button.val("哪里没填对啊...");
			}
		}
		
	});
});