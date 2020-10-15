var darkEnabled = false; 
$(document).ready(function(){
    $('#bright').on('click', switchDarkMode);
    $('#reset').on('click', reset);
});
      
    function switchDarkMode(){
        darkEnabled = !darkEnabled;
        if(darkEnabled){
          $('.card').addClass('darkMode');
        } else {
          $('.card').removeClass('darkMode');
        }
    }
      
    function reset(){
        $('.card').removeClass('darkMode');
    }
