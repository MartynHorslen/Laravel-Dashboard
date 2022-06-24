$( ".navbar-toggler" ).click(function() {
    if ($(".sidebar").hasClass("close")){
        $(".sidebar").addClass("left").removeClass('close');
    } else {
        $(".sidebar").addClass("close").removeClass("left");
    }       
});