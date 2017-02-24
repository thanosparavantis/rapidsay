function AjaxSearch(paginator)
{
    var search = this;
    this.paginator = paginator;

    this.button = $("#search");
    this.query = $("#query");

    this.resultCount = $("#result-count");
    this.counter = $("#count");
    this.results = $("#explore-content");

    this.listen = function()
    {
        this.query.keypress(function (event) {
            if (event.which == 13 && !event.shiftKey)
            {
                event.preventDefault();
                search.submit();
            }
        });

        this.button.click(function(event) {
            event.preventDefault();
            search.submit();
        });
    }

    this.submit = function()
    {
        if (search.query.val() != "")
        {
            search.results.empty();

            $.ajax({
                type: 'POST',
                url: search.button.attr("href"),
                timeout: largeTimeout,
                data: {
                    query: search.query.val(),
                },
                success: function (data) {
                    search.results.append(data.html);
                    search.query.val(data.query);

                    if (data.count != null)
                    {
                        if (data.count > 0)
                        {
                            search.resultCount.show();
                        }
                        else
                        {
                            search.resultCount.hide();
                        }

                        search.counter.html(data.count);

                        search.paginator.resetPage();

                        search.paginator.setMethod("POST");
                        search.paginator.setUrl(search.button.attr("href"));

                        search.paginator.setSendData({
                            query: search.query.val(),
                        });

                        search.paginator.setEnded(data.end);

                        rate.register();
                        subscribe.register();
                    }
                },
                error: function() {
                    console.log("Failed to retrieve search results.");
                }
            });
        }
    }
}
