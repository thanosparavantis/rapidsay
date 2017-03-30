rate = new Rate;
subscribe = new Subscribe;

$(document).ready(function() {
    alerts = new Alert;
    alerts.register();
    alerts.showInternetExplorerAlert();
    initializeDropdowns();
});

function initializeImageUploader()
{
    uploaders = $(".uploader");

    uploaders.each(function() {
        input = $(this).find("input");
        form = $(this).closest("form");

        form.submit(function (event) {
            uploader = $(this).find(".uploader");
            input = uploader.find("input");
            files = input[0].files.length;
            processingText = $("#" + input.attr("name").replace("[]", "\\[\\]") + "-processing");

            if (files > 0) {
                processingText.show();
            }
        });

        input.on("change", function (event) {
            uploader = $(this).parent();
            files = $(this)[0].files.length;
            count = uploader.find("[data-type='count']");

            count.hide();

            if (files > 0)
            {
                count.html(files);
                count.show();
            }
        });

        $(this).contextmenu(function (event) {
            event.preventDefault();

            uploader = $(this);
            input = uploader.find("input");
            count = uploader.find("[data-type='count']");

            input.val("");
            count.hide();
        });
    });
}

function initializeDropdowns()
{
    $(".dropdown").each(function() {
        dropdown = $(this);
        button = $(this).find(".button");

        button.click(function(event) {
            event.preventDefault();
            $(this).toggleClass("clicked");
            items = $(this).parent().find(".items");
            items.slideToggle(200, function() {
                if ($(this).css('display') == 'block') $(this).css('display', 'flex');
            });
        });
    });
}
