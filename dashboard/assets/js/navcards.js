$(document).ready(function(){
    $('.navcard').on('click', function(){
        window.location.href = $(this).data('href'); 
    })
})