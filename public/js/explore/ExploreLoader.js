$(document).ready(function() {
    paginator = new AjaxPaginator("explore-content", "page", (function() {
        rate.register();
        subscribe.register();
    }));

    paginator.load();
    paginator.loadOnScroll();

    search = new AjaxSearch(paginator);
    search.listen();
});
