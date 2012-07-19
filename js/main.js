$(function () {
    //Search box
    var msg = $("#s");
    msg.attr("value","Press enter to search...");
    $(msg).click(function (value) {
        if(msg.val()=='Press enter to search...') {
            msg.attr("value","").css('color','black');
        }
    });
    $(msg).focusout(function () {
        if($(msg).attr("value")=='') {
            $(msg).val("Press enter to search...").css('color','grey');
        }
    });
    //Content
    var currentPage = $("#page").html();
    $.ajax({
        url: "list.php",
        method: "get",
        data: "page=" + currentPage,
        success: function (result) {
            $("#all-items").html(result);
            $("#pages").show();
        }
    });
    $("#loading-bar").fadeToggle();
	
});