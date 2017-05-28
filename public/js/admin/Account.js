$(document).ready(function() {
    this.dropdown = $("#admin-actions");

    registerItems();

    function clickItem(event, item, callback)
    {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: item.attr("data-target"),
            timeout: shortTimeout,
            success: function(data) {
                dropdown.replaceWith(data.html);
                dropdowns.register();
                dropdowns.open(dropdown);
                registerItems();

                if (callback) callback(data);
            },
            error: function() {
                console.log("Whoops, something went wrong.");
            },
        });
    }

    function registerItems()
    {
        $("#reputation").click(function (event) {
            event.preventDefault();
            button = $(this);

            var input;
            while (isNaN(input)) input = prompt(button.attr('data-prompt'));

            if (!input) return;

            $.ajax({
                type: 'POST',
                url: button.attr('data-target'),
                timeout: shortTimeout,
                data: { reputation: input },
                success: function(data) {
                    alert(button.attr('data-success'));
                    $("#placement-count").html(data.placement);
                    $("#reputation-count").html(data.reputation);
                },
                error: function() {
                    alert(button.attr('data-error'));
                }
            });
        });

        $("#activate").click(function (event) {
            clickItem(event, $(this));
        });

        $("#ban").click(function (event) {
            clickItem(event, $(this));
        });

        $("#ban-ip").click(function (event) {
            clickItem(event, $(this));
        });

        $("#delete-account").click(function (event) {
            confirmText = $(this).attr('data-confirm');

            if (confirm(confirmText))
            {
                clickItem(event, $(this), function(data) {
                    alert(data.message);
                    window.location = data.target;
                });
            }
        });
    }
});
