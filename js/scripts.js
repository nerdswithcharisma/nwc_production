jQuery(document).ready(function(){
    jQuery('#nav-toggle').on('click', function(){
        jQuery('#pushContent').toggleClass('content--open');  
        jQuery('#pushNav').toggleClass('navigation--open');
    });
});