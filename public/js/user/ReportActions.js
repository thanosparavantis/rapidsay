function ReportActions()
{
    var reportActions = this;
    this.canClick = true;

    this.register = function()
    {
        $("[id*='deny-report-button']").each(function() {
            $(this).click(function(event) {
                reportActions.click(event, $(this));
            });
        });
    }

    this.click = function(event, button)
    {
        event.preventDefault();

        if (this.canClick)
        {
            this.submit(button);
            this.canClick = false;
            setTimeout(function () {
                reportActions.canClick = true;
            }, 500);
        }
    }

    this.submit = function(button)
    {
        $.ajax({
            type: 'POST',
            url: button.attr('data-target'),
            success: function (data) {
                button.parent().parent().parent().fadeOut(500, function() {
                    $(this).remove();
                    if (!$("#reports-content > .report").length) $(".empty-content").removeClass("hidden");
                });
            },
            error: function () {
                console.log("Could not deny report.");
            }
        });
    }
}
