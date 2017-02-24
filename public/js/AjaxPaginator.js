function AjaxPaginator(elementId, pageName, successCallback)
{
    pageName = pageName || "page";

    var paginator = this;
    this.element = $("#" + elementId);
    this.loading = $(".loading");
    this.pageName = pageName;
    this.page = 1;
    this.end = false;
    this.scrolledBottom = false;
    this.firstLoad = false;
    this.successCallback = successCallback;
    this.method;
    this.url;
    this.sendData = {};

    this.load = function()
    {
        $(document).ready(function() {
            paginator.get();
        });
    }

    this.loadOnScroll = function()
    {
        $(window).scroll(function() {
            if (paginator.firstLoad && !paginator.scrolledBottom && !paginator.end && $(window).scrollTop() + $(window).height() > $(document).height() - loadDataMinScroll)
            {
                paginator.get(true, ++paginator.page);
                paginator.scrolledBottom = true;
            }
        });
    }

    this.get = function(expand, page)
    {
        expand = expand || false;
        page = page || 1;

        this.loading.show();

        $.ajax({
            type: paginator.method || 'GET',
            url: (paginator.url || '') +  '?' + paginator.pageName + '=' + paginator.page,
            data: paginator.sendData,
            timeout: shortTimeout,
            success: function(data) {
                if (expand)
                {
                    paginator.element.append(data.html);
                    paginator.scrolledBottom = false;
                }
                else
                {
                    paginator.element.prepend(data.html);
                    paginator.firstLoad = true;
                }

                paginator.end = data.end;

                if (paginator.successCallback !== undefined) paginator.successCallback();
                paginator.loading.hide();
            },
            failure: function() {
                console.warn("Failed to retrieve " + paginator.pageName + " data.");
            },
        });
    }

    this.resetPage = function()
    {
        this.page = 1;
    }

    this.setEnded = function(end)
    {
        this.end = end;
    }

    this.setMethod = function (method)
    {
        this.method = method;
    }

    this.setUrl = function (url)
    {
        this.url = url;
    }

    this.setSendData = function(sendData)
    {
        this.sendData = sendData;
    }
}
