$(document).ready(function(){

    $(window).scroll(function(){
        scrolling = $(document).scrollTop();
	    if(scrolling >= 500)
            $('#backToTop').css('opacity', '1');
    });

    $('#backToTop').on('click', function(){
        $('body').scrollTop(0);
    });
    
});