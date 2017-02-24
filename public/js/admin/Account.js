$(document).ready(function() {
    $('#reputation').click(function (event) {
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
            url: button.attr('data-href'),
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
