$(function () {
    
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        var postdata = $('#contactForm').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'https://httpbin.org/post',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                $('#contact').modal('hide');
                $('#FormSuccess').modal('toggle');
                $("#contactForm")[0].reset();
                $('#contact').fadein();           
            }
        });
    });
})
               
 