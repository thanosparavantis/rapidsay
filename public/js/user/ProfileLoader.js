activity = new AjaxPaginator("activity-content", "activity", function() {
    rate.register();
    subscribe.register();
});

activity.load();
activity.loadOnScroll();
