$(document).ready(function() {
$("#shout_write_btn").live("click",function() {
        var content=$("#shouts_write_sec").val();
        var datas="content="+content;
            if (content=="") {
                syserror("You have to write something.");
            return false;
        }
        else {
            $("#shouts_write_sec").val("");
        $.ajax({
            type:"POST",
            url:"write_shout.php",
            data:datas,
            cache:false,
            success:function(html) {
                $("#people_shouts").prepend(html);
                return false;
            }
        });
        return false;
        }
    });
    $("#love_btn").live("click",function() {
        var snum=$(this).attr("snum");
        var datas="snum="+snum;
        $.ajax({
            type:"POST",
            url:"love.php",
            data:datas,
            cache:false,
            success:function(html) {
                $("."+snum).empty().html(html);
            }
        });
    });
    $("*#hate_btn").click(function() {
        var snum=$(this).attr("snum");
        $.ajax({
            type:"POST",
            url:"hate.php",
            data:"snum="+snum,
            cache:false,
            success:function(html) {
                
                return false;
            }
        });
    });
});
