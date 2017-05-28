$(document).ready(function() {
    navbar = $("#mobile-navbar");
    toggle = $("#menu-toggle");
    menu = $(".navbar-menu");

    toggle.click(function(event) {
        toggle.toggleClass("toggled");
        menu.slideToggle({
            duration: 400,
            step: function() {
                $(this).css('display', 'flex');
            }
        });
    });

    $('body').bind('touchstart touchmove', function(event) {
        if (toggle.hasClass("toggled"))
            $(this).css('max-width', '100%').css('overflow', 'hidden');
        else
            $(this).css('max-width', 'auto').css('overflow', 'auto');
    });
});
