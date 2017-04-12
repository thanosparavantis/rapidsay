function Alert()
{
    var alert = this;

    this.register = function()
    {
        $(".alert").each(function() {
            element = $(this);
            button = element.find(".close");

            button.click(function (event) {
                alert.click($(this).parent());
                alert.submit($(this));
            });
        });
    }

    this.click = function(alert)
    {
        alert.slideUp("medium", function() {
            alert.remove();
        });
    }

    this.submit = function(button)
    {
        if (button[0].hasAttribute('data-target'))
        {
            $.ajax({
                type: 'POST',
                url: button.attr('data-target'),
                timeout: shortTimeout,
                error: function() {
                    console.log("Failed to close announcement.");
                }
            });
        }
    }

    this.showInternetExplorerAlert = function()
    {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))
        {
            ieAlert = $("#ie-alert");
            if (ieAlert.length) ieAlert.show();
        }
    }
}
