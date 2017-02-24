navbar = $(".navbar");
expander = $(".navbar .toggle-menu");
menu = $(".navbar .menu");

firstCount = $(".first-count");
firstCountVisible = firstCount.is(":visible");

expander.click(function (event) {
    event.preventDefault();
    navbar.toggleClass('expanded');

    if (firstCountVisible)
    {
        firstCount.toggle();
    }
});
