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
						$("bookAuthor").text(book.author + " " + book.price);
						
						$("#ajaxTitle").val(book.title);
						$("#ajaxAuthor").val(book.author);
						$("#ajaxCover").val(book.image);
						$("#ajaxListPrice").val(parseInt(book.price));
						
						$("#intro").append("<image align='right' src='" + book.image + "'>");
						nextButton.removeAttr("disabled");
					})
					.fail(function(){
		            	$("bookTitle").text("ISBN 有误");
		            	$("bookAuthor").text("");
						$("#ajaxTitle").val("");
						$("#ajaxAuthor").val("");
						$("#ajaxCover").val("");
						$("#ajaxListPrice").val("");
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
			['9787312028120','微积分学导论上册'],
			['9787312029851','微积分学导论下册'],
			['9787030134226','微积分学习辅导（科大版）'],
			['9787560961378','线性代数解题方法技巧归纳（毛纲源）'],
			['9787040198706','线性代数（李尚志）'],
			['9787312022982','线性代数（李炯生）'],
			['9787030107466','线性代数学习指导（樊恽）'],
			['9787040184549','数学分析中的典型问题与方法（裴礼文）'],
			['9787301065501','数学分析解题指南（林源渠）'],
			['9787040054859','复变函数学习辅导书（钟玉泉）'],
			['9787312000393','复变函数（非数学类教材）'],
			['9787030088833','数学物理方法学习指导（姚端正）'],
			['9787532378784','费恩曼物理学讲义（第1卷）'],
			['9787532378746','费恩曼物理学讲义（第2卷）'],
			['9787532378753','费恩曼物理学讲义（第3卷）'],
			['9787533101008','吉米多维奇数学分析习题集题解2'],
			['9787533101015','吉米多维奇数学分析习题集题解3'],
			['9787533101022','吉米多维奇数学分析习题集题解4'],
			['9787533101039','吉米多维奇数学分析习题集题解5'],
			['9787533101046','吉米多维奇数学分析习题集题解6'],
			['9787040110845','力学（郑永令）'],
			['9787040208498','力学（朗道）'],
			['9787301094020','力学习题与解答（舒幼生）'],
			['9787030154941','大题典力学上册'],
			['9787030202857','理论力学学习指导与习题解析（鞠国兴）'],
			['9787030094025','电磁学千题解'],
			['9787030107442','模拟电子线路习题精解']
		];
		regBio = [
			['9787508634159', '自私的基因'],
		    ['9787040121940', '神经科学——探索脑'],
		    ['9787040060072', '陈阅增普通生物学'],
		    ['9787312023002', '无机化学']
		];
		regCS = [
			['9787302148111', '数据结构'],
		    ['9787111128069', 'C程序设计语言'],
		    ['9787111187776', '算法导论'],
		    ['9787040130133', '电路理论基础'],
		    ['9787810821810', '电路基本理论'],
		    ['9787121139512', '浪潮之颠'],
		    ['9787111353515', '计算机程序设计（科大版）'],
		    ['9787302198000', 'Java程序设计']
		];
		regEE = [
			['9787040130133', '电路理论基础'],
			['9787810821810', '电路基本理论']
		];
		regEng = [
			['9787800804908','GRE红宝顺序'],
			['9787802561038','GRE红宝乱序'],
			['9787802562547','再要你命3000'],
			['9787802560628','托福红宝顺序'],
			['9787560555898','托福红宝乱序'],
			['9787507818031','英语词汇的奥秘'],
			['9787506273367','六级词汇红宝顺序'],
			['9787800808814','六级词汇红宝乱序'],
			['9787800806346','托福词以类记'],
			['9787544613477','大学英语读写1'],
			['9787544623926','大学英语读写2'],
			['9787544616768','大学英语读写3'],
			['9787544617642','大学英语读写4'],
			['9787544621427','大学英语读写5'],
			['9787544613477','GRE官方指南'],
			['9787561924518','托福官方指南'],
			['9787560067292','新概念英语1'],
			['9787506203524','新概念英语2'],
			['9787560013480','新概念英语3'],
			['9787560067322','新概念英语4']
		];
		regSoc = [
			['9787040240474','思修'],
		    ['9787040267723','近代史'],
		    ['9787040267716','马哲'],
		    ['9787040240986','毛概']
		];
		regOther = [
			['9787505722835','盗墓笔记1'],
			['9787505723306','盗墓笔记2'],
			['9787505723856','盗墓笔记3'],
			['9787505724778','盗墓笔记4'],
			['9787536692930','三体1'],
			['9787536693968','三体2'],
			['9787229030933','三体3'],
			['9787540211981','福尔摩斯探案集']
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
	
	$("#paper").on('input', function(){		
		if ($(this).val().length > 0) {
			$("#button2").removeAttr("disabled");
		}
		else {
			$("#button2").attr("disabled", "true");
		}
	})
	
	$("#RegularTitle").change(function(){
		//alert("onChange");
		$('#BookIsbn').val($(this).val());
		setButton2();
	})
	
	$("#BookIsbn").click(function(){
		//alert("click");
		if ($(this).val().length == 0) {
			$(this).val("9787");
		}
	});
	
	$("#BookIsbn").on('input', function(){
		//alert("onInput");
		setButton2();
	})
	
	$("input[name='data[Book][price]']").on('input', function(){
		var submit = $('input[type=submit]');
		if ($(this).val() == '') {
			submit.attr('disabled', 'true');
		}
		else if ( 0 <= $(this).val() && $(this).val() <= 100 ) {
			submit.removeAttr('disabled');
		}
		else {
			submit.attr('disabled', 'true');
		}
		
	})
})