jQuery(document).ready(function(){
    
    /* nav toggle on home page */
    jQuery('#nav-toggle').on('click', function(){
        jQuery('#pushContent').toggleClass('content--open');  
        jQuery('#pushNav').toggleClass('navigation--open');
    });
    
    /* ajax load pages */
    jQuery('#blog-loop a').on('click', function(e){
        e.preventDefault();
        
        $('#blog-loop a').removeClass('active');
        $(this).addClass('active');
        
        $.ajax({
            url: jQuery(this).attr("href"),
            dataType: "html",
            success: function(data) {
                var content = $(data).find('#post-content');
                
                $('.blog-post').fadeOut(500, function(){
                    $('.blog-post').html(content);
                    $('.blog-post').fadeIn(500);
                });

            },
            error: function() {
    	       console.log('Well this is embarrising. We are unable to find this post  ');
            }
        });
        
        $.ajax({
            url: jQuery(this).attr("href"),
            dataType: "html",
            success: function(data) {
                var content = $(data).find('#post-content');
                
                $('.blog-post').fadeOut(500, function(){
                    $('.blog-post').html(content);
                    $('.blog-post').fadeIn(500);
                });

            },
            error: function() {
    	       console.log('Well this is embarrising. We are unable to find this post  ');
            }
        });
    });
    
    if( jQuery('article').hasClass('first-load') ){
        $.ajax({
            url: jQuery('#blog-loop a').first().attr("href"),
            dataType: "html",
            success: function(data) {
                var content = $(data).find('#post-content');
                
                $('.blog-post').fadeOut(500, function(){
                    $('.blog-post').html(content);
                    $('.blog-post').fadeIn(500);
                });

            },
            error: function() {
    	       console.log('Well this is embarrising. We are unable to find this post  ');
            }
        });
    }
});

