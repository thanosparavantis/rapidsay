$(document).ready(function() {
    paginator = new AjaxPaginator("feed-content", "page", (function() {
        rate.register();
    }));

    paginator.load();
    paginator.loadOnScroll();
});
