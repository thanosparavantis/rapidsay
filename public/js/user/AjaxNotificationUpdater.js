function AjaxNotificationUpdater()
{
    var notifications = this;

    this.url = $("meta[name=notification-updater-url]").attr("content");

    this.listen = function()
    {
        setInterval(function() {
            notifications.update();
        }, 60000);
    }

    this.update = function()
    {
        $.ajax({
            type: 'POST',
            url: notifications.url,
            timeout: 5000,
            success: function (data) {
                $("[id=notification-counter]").each(function() {
                    counter = $(this);

                    if (data.unseen > 0) counter.show();
                    else counter.hide();

                    counter.html(data.unseen);
                });
            },
            error: function() {
                console.log("Failed to update notification counter.");
            }
        });
    }
}
