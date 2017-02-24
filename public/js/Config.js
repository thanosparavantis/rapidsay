// CSRF token
$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
});

loadDataMinScroll = 50;
shortTimeout = 5000;
largeTimeout = 60000;
