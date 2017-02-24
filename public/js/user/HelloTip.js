$(document).ready(function() {
    helloTipBox = $("#hello-tip-box");
    helloTip = $("#hello-tip");

    if (helloTipBox.length)
    {
        helloTip.click(function (event) {
            $("#body").html(helloTip.attr("data-value"));
            $("#post-create-button").focus();
            helloTipBox.slideUp("medium");
        });
    }
});
