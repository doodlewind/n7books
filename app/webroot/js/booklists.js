$(document).ready(function(){
	$("option").each(function(){
		if ($(this).val() == $("#querySchool").val()) {
			$(this).parent().val($(this).val());
		}
		if ($(this).val() == $("#queryGrade").val()) {
			$(this).parent().val($(this).val());
			
		}
		if ($(this).val() == $("#querySemester").val()) {
			$(this).parent().val($(this).val());
		}
	});
	
	$("select").change(function(){
		if ($("#grade").val()!='' && $("#school").val()!='' && $("#semester").val()!='') {
			$("#submit").removeAttr("disabled");
		}
		else {
			$('#submit').attr("disabled", "true");
		}
	});
	
});