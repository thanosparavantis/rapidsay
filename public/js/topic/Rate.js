function Rate()
{
    var rate = this;
    this.canClick = true;

    this.registerOnLoad = function()
    {
        $(document).ready(function() {
            rate.register();
        });
    }

    this.register = function()
    {
        $("[id='rate-button'][href*='rate']").each(function () {
            button = $(this);

            button.click(function (event) {
                rate.click(event, $(this));
            });
        });
    }

    this.click = function (event, button)
    {
        event.preventDefault();

        if (this.canClick)
        {
            this.submit(button);
            this.canClick = false;
            setTimeout(function () {
                rate.canClick = true;
            }, 500);
        }
    }

    this.submit = function(button)
    {
        href = button.attr('href').split('/');
        type = href[href.length - 3];
        id = href[href.length - 2];

        $.ajax({
            type: 'POST',
            url: button.attr('href'),
            timeout: 5000,
            success: function (data) {
                newButton = $($.parseHTML($.trim(data.html)));
                newButton.click(function (event) {
                    rate.click(event, $(this));
                });

                button.replaceWith(newButton);
            },
            error: function() {
                console.log("Failed to store rating.");
            }
        });
    }
}
