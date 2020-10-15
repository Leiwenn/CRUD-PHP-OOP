$(document).ready(function(){

    $(window).scroll(function(){
        scrolling = $(document).scrollTop();
	    if(scrolling >= 500)
            $('#backToTop').css('opacity', '1');
    });

    $('#backToTop').on('click', function(e){
        e.preventDefault();
        window.scrollTo(0,0);
    });
});