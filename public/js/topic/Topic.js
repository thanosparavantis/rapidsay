$(document).ready(function() {
    rate.register();

    $("[data-confirm-dialog]").each(function() {
        $(this).click(function (event) {
            proceed = confirm($(this).attr("data-confirm-dialog"));
            if (!proceed) event.preventDefault();
        });
    });

    // Comment

    hash = window.location.hash;

    if (hash && hash == "#comment-creator")
    {
        $("#comment-body").focus();
        history.pushState("", document.title, window.location.pathname);
    }

    // Media
    // .media-gallery
    //    .container (.expanded)
    //        .image

    $("[class*=image]").each(function() {
        if ($(this).parent().attr("class").includes("container"))
        {
            $(this).click(function(event) {
                event.preventDefault();

                container = $(this).parent();
                media = container.parent();
                expanded = container.clone().addClass("expanded");

                expanded.click(function(event) {
                    event.preventDefault();
                    $(this).remove();
                });

                media.append(expanded);
            });
        }
    });
});
