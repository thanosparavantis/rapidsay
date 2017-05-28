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
                $("[class*='notification-holder'][href*='" + notifications.url + "']").each(function() {
                    counter = $(this).find(".count");

                    counter.removeClass("visible");

                    if (data.unseen > 0) counter.addClass("visible")
                    else counter.removeClass("visible");

                    counter.html(data.unseen);
                });
            },
            error: function() {
                console.log("Failed to update notification counter.");
            }
        });
    }
}
