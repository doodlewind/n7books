$(document).ready(function(){
	$("option").each(function(){
		if ($(this).val() == $("#bookCategory").val()) {
			$(this).attr("selected", "true");
		}
		if ($(this).val() == $("#bookType").val()) {
			$(this).attr("selected", "true");
		}
		if ($(this).val() == $("#bookFineness").val()) {
			$(this).attr("selected", "true");
		}
		if ($(this).val() == $("#userSchool").val()) {
			$(this).attr("selected", "true");
		}
		if ($(this).val() == $("#userCampus").val()) {
			$(this).attr("selected", "true");
		}
	});
	
});