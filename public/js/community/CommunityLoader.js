$(document).ready(function() {
    community = new AjaxPaginator("community-content", "page", function() {
        subscribe.register();
    });
    community.load();
    community.loadOnScroll();
});
