$(document).ready(function() {
    rate = new Rate;
    subscribe = new Subscribe;

    alerts = new Alert;
    alerts.register();
    alerts.showInternetExplorerAlert();

    dropdowns = new Dropdowns;
    dropdowns.register();

    $("#guest-lang-select").on('change', function() {
        $("#guest-lang-form").submit();
    });
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
