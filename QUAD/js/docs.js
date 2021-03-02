$(document).ready(function() {
	$("#docsubmit").click(function() {
		var docfile=$("#docfile").val();
		if (docfile=="") {
			syserror("Please, select a file.");
            return false;
		}
	});
    $("#comment_do").click(function() {
           var comment=$("#doccomment_writsec").val();
           var dnum=$(".dc").attr("dnum");
           if (comment=="") {
				syserror("Please write a comment.");
           }
		   else {
				$.ajax({
                type: "POST",
                url: "add_comment_doc.php",
                data: "dnum="+dnum+"&comment="+comment,
                cache: false,
                success: function(html){
                    $("#wheredcgos").prepend(html);
                    $("#dc:first").hide().fadeIn("slow");
                    $("#doccomment_writsec").val("").animate({height:'30px'});
				}
				});
           }
           return false;
        });
    $("*#docsback").click(function() {
        $("#docscomments").slideUp("slow", function() {
            $("#content").load("docs.php");
        });
    });
    $("#doc_comment_del_btn").live("click",function(event) {
        if(confirm("Are you sure?")) {
        var dcnum=$(this).attr("dcnum");
        $(this).hide().parent().slideUp("slow");
       $.ajax({
            type: "POST",
            url: "del_doc_comment.php",
            data: "dcnum="+dcnum,
            cache: false,
            success: function(){
                }
            });
            }
       event.stopImmediatePropagation();
    });
    $("*#del_btn").click(function() {
        var dnum=$(this).attr("dnum");
        $(this).hide().parent().parent().slideUp("slow");
        $.ajax({
           type:"POST",
           url:"del_doc.php",
           data:"dnum="+dnum,
           cache:false 
        });
    });
    $("#search_doc").click(function() {
        var term=$("#search_doc_term").val();
        $("#doc_search_res").empty();
        $("#commentssec").empty();
        $.ajax({
            type:"POST",
            url:"search_doc.php",
            data:"term="+term,
            cache:false,
            success: function(html) {
                $("#doc_search_res").hide().append(html).slideDown("slow");
                $("#docssec").slideUp("slow");
            }
        });
    });
});