$(document).ready(function() {
    subscriptions = new AjaxPaginator('subscriptions-content', 'page', function() {
        subscribe.register();
    });

    subscriptions.load();
    subscriptions.loadOnScroll();
});
