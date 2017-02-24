function Subscribe()
{
    var subscribe = this;
    this.canClick = true;

    this.register = function()
    {
        $("[id=subscribe-button]").each(function () {
            $(this).click(function (event) {
                subscribe.click(event, $(this));
            });
        });
    }

    this.click = function(event, button)
    {
        event.preventDefault();

        if (this.canClick)
        {
            subscribe.submit(button);
            this.canClick = false;
            setTimeout(function () {
                subscribe.canClick = true;
            }, 500);
        }
    }

    this.submit = function(button)
    {
        $.ajax({
            type: 'POST',
            url: button.attr('data-target'),
            timeout: 5000,
            success: function (data) {
                newButton = $($.parseHTML($.trim(data.html)));
                newButton.click(function (event) {
                    subscribe.click(event, $(this));
                });
                button.replaceWith(newButton);
            },
            error: function () {
                console.log("Failed to update subscription.");
            }
        });
    }
}
