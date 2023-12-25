jQuery(document).ready(function($) {
    $('.sidebar-box .nav-menus .menus a .icon').click(function(e){
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });
});