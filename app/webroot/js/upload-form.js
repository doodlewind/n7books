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
						
						$("#ajaxTitle").val(book.title);
						$("#ajaxAuthor").val(book.author);
						$("#ajaxCover").val(book.image);
						
						$("#intro").append("<image align='right' src='" + book.image + "'>");
						nextButton.removeAttr("disabled");
					})
					.fail(function(){
		            	$("bookTitle").text("ISBN 有误");
		            	$("bookAuthor").text("");
						$("#ajaxTitle").val("");
						$("#ajaxAuthor").val("");
						$("#ajaxCover").val("");
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
			['9787312028120', '微积分学导论上册'],
			['9787312029851', '微积分学导论下册'],
			['9787040110845', '力学（郑永令）'],
			['9787532378784', '费曼物理学讲义（第1卷）'],
			['9787533101008', '吉米多维奇题解2'],
			['9787030094025', '电磁学千题解'],
			['9787040183023', '数学分析卓里奇（第1卷）'],
			['9787301065501', '数学分析解题指南'],
			['9787040010251', '固体物理学'],
			['9787506273145', '现代量子力学']
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
		    ['9787121139512', '浪潮之巅'],
		    ['9787111353515', '计算机程序设计（科大版）'],
		    ['9787302198000', 'Java程序设计']
		];
		regEE = [
			['9787040130133', '电路理论基础'],
			['9787810821810', '电路基本理论']
		];
		regEng = [
			['9787800804908', 'GRE红宝顺序'],
			['9787802561038', 'GRE红宝乱序'],
			['9787802562547', '再要你命3000'],
			['9787560555898', '托福红宝乱序'],
			['9787802560628', '托福红宝顺序'],
			['9787507818031', '英语词汇的奥秘'],
			['9787506273367', '六级词汇红宝顺序'],
			['9787800808814', '六级词汇红宝乱序'],
			['9787800806346', '托福词以类记'],
			['9787030373786', '拯救我的新GRE写作']
		];
		regSoc = [
			['9787040240474', '思修'],
		    ['9787040267723', '近代史'],
		    ['9787040267716', '马哲'],
		    ['9787040240986', '毛概'],
		    ['9787510042171', '经济学的思维方式'],
		    ['9787563349890', '谈美'],
		    ['9787563344970', '娱乐至死'],
		    ['9787500627098', '沉默的大多数'],
		    ['9787505722460', '明朝那些事（一）'],
		    ['9787505722859', '明朝那些事（二）']
		];
		regOther = [
			['9787513517324', '叶芝诗选'],
			['9787540218553', '王尔德精选集'],
			['9787108006639', '笑傲江湖'],
			['9789620744136', '古诗十九首'],
			['9787539921624', '红拂夜奔'],
			['9787807592129', '三重门'],
			['9787532754748', '潮骚'],
			['9787540211981', '福尔摩斯探案集'],
			['9787532758449', '都柏林人'],
			['9787807592709', '上海堡垒'],
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