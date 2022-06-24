$( ".navbar-toggler" ).click(function() {
    if ($(".sidebar").hasClass("close")){
        $(".sidebar").addClass("left").removeClass('close')
        setTimeout(function() {
            $(".sidebar").removeClass('left')
        }, 600);
    } else {
        $(".sidebar").addClass("close").removeClass("left");
    }       
});