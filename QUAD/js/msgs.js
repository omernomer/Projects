function syserror(msg) {
    $("*#errormsg").remove();
    $("#content").append("<center><div id=\"errormsg\">"+msg+"</div></center>");
	$("#errormsg").hide().fadeIn('slow').delay('3000').fadeOut('slow', function() {
			$("*#errormsg").remove();
	});
}
function syssucs(msg) {
    $("*#sucsmsg").remove();
    $("#content").append("<div id=\"sucsmsg\">"+msg+"</div>");
	$("#sucsmsg").hide().fadeIn('slow').delay('3000').fadeOut('slow', function() {
			$("*#sucsmsg").remove();
	});
}
