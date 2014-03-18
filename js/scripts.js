jQuery(document).ready(function(){
    
    /* nav toggle on home page */
    jQuery('#nav-toggle').on('click', function(){
        jQuery('#pushContent').toggleClass('content--open');  
        jQuery('#pushNav').toggleClass('navigation--open');
    });
});

