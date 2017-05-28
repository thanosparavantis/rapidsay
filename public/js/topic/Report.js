$(document).ready(function() {
    autosize($("textarea"));

    $("#report-form").on('submit', function() {
        $("#report-button").prop('disabled', 'true');
    });
});
