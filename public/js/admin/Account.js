$(document).ready(function() {
    form = $("#admin-form");

    $("#activate").click(function (event) {
        form.attr("action", $(this).attr("data-target"));
        form.submit();
    });

    $("#reset").click(function (event) {
        form.attr("action", $(this).attr("data-target"));
        form.submit();
    });

    $("#ban").click(function (event) {
        form.attr("action", $(this).attr("data-target"));
        form.submit();
    });

    $("#ban-ip").click(function (event) {
        form.attr("action", $(this).attr("data-target"));
        form.submit();
    });

    $("#reputation").click(function (event) {
        event.preventDefault();
        button = $(this);

        var input;

        while (isNaN(input))
        {
            input = prompt(button.attr('data-prompt'));
        }

        if (!input) return;

        $.ajax({
            type: 'POST',
            url: button.attr('data-target'),
            timeout: 5000,
            data: { reputation: input },
            success: function() {
                alert(button.attr('data-success'));
            },
            error: function() {
                alert(button.attr('data-error'));
            }
        });
    });
});
