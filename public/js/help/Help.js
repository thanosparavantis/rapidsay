$(document).ready(function() {
    $("h2[id*=toggle]").each(function () {
        toggle = $(this);
        toggle.click(function (event) {
            event.preventDefault();
            menu = $(this).attr('id').split('-')[0];
            $("#" + menu).slideToggle();
        });
    });
});
