$(document).ready(function(){
	
	var appendRegularBook = function(booklist){
		var regularTitle = $("#RegularTitle");
		for(i=0; i < booklist.length; i++){
			tmp = "<option value='"+ booklist[i][0] + "'>" + booklist[i][1] + "</option>";
			regularTitle.append(tmp);
		}
	};
	var setButton2 = function(){
		var regularTitle = $("#RegularTitle");
		var nextButton = $("#button2");
		var isbn = $("#BookIsbn");
		nextButton.attr("disabled", "true");
		$("img").remove();
		$("#intro").hide();
		if (isbn.val().length > 0) {
			if (isbn.val().length == 13) {
				//9787312028120
				url = "https://api.douban.com/v2/book/isbn/"+isbn.val()+"?callback=?";
				
				$.getJSON(url)
					.done(function(book){
						$("bookTitle").text(book.title + " - ");
						$("bookAuthor").text(book.author);
						$("#intro").append("<image align='right' src='" + book.image + "'>");
						nextButton.removeAttr("disabled");
					})
					.fail(function(){
		            	$("bookTitle").text("ISBN 有误");
		            	$("bookAuthor").text("");
					})
					.always(function(){
						$("#intro").show();
					});
			}
		}
		else {
			regularTitle.removeAttr("disabled");	
		}
	}
	
	$("#button1").attr("disabled", "true");
	
	$('#step1 :input').change(function(){
		var type = $("input[name='data[Book][type]']:checked");
		var category = $("#BookCategory");
		var nextButton = $("#button1");
		
		if(category.val() != "" && type.val() != undefined ) {
			nextButton.removeAttr("disabled");	
		}
		else {
			nextButton.attr("disabled", "true");
		}
	});
	
	$("#button1").click(function(){
		var type = $("input[name='data[Book][type]']:checked");
		var regularTitle = $("#RegularTitle");
		regMath = [
			['1000', '微积分'],
			['1001', '线代']
		];
		regBio = [
		
		];
		regCS = [
		
		];
		regEE = [
		
		];
		regEng = [
		
		];
		regSoc = [
		
		];
		regOther = [
		
		];
		
		if(type.val()=='书籍') {
			$(".paper").remove();
			var category = $("#BookCategory");
			switch (category.val()) {
				case '数理':
					appendRegularBook(regMath);
					break;
				case '生化':
					appendRegularBook(regBio);
					break;
				case '信息':
					appendRegularBook(regCS);
					break;
				case '工程':
					appendRegularBook(regEE);
					break;
				case '外语':
					appendRegularBook(regEng);
					break;
				case '社科':
					appendRegularBook(regSoc);
					break;
				case '杂家':
					appendRegularBook(regOther);
					break;
			}
		}
		else {
			$(".book").remove();
		}
		$("#intro").hide();
	});
	
	$("#RegularTitle").change(function(){
		//alert("onChange");
		$('#BookIsbn').val($(this).val());
		setButton2();
	})
	
	$("#BookIsbn").click(function(){
		//alert("click");
		if ($(this).val().length == 0) {
			$(this).val("978");
		}
	});
	
	$("#BookIsbn").on('input', function(){
		//alert("onInput");
		setButton2();
	})


})