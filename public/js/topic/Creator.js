$(document).ready(function() {
    submitted = false;

    $("[id*='creator']").each(function () {
        creator = $(this);
        body = creator.find("textarea");

        // Word count.
        body.on('keyup', function(event) {
            wordCount = $(this).parent().parent().find("#word-count");
            count = $(this).attr('maxlength') - $(this).val().length;
            if (count < 500) wordCount.addClass("near-limit");
            else wordCount.removeClass("near-limit");
            wordCount.html(count);
        });

        creator.submit(function(event) {
            submitted = true;
            $(this).find("button[type=submit]").prop("disabled", true);
        });

        $(window).bind("beforeunload", function(event) {
            message = creator.attr("data-discard-message");
            if (!submitted && message.length && body.val().length) return message;
        });

        autosize(body);
    });

    initializeImageUploader();
});
