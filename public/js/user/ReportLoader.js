$(document).ready(function() {
    reportActions = new ReportActions();
    reports = new AjaxPaginator('reports-content', 'page', function() {
        reportActions.register();
        rate.register();
    });

    reports.load();
    reports.loadOnScroll();
});
