function Feed(successCallback)
{
    this.feed = this;
    this.scrolledBottom = false;

    this.element = $("#feed-content");
    this.currentTab;

    this.sections = $("#sections");
    this.trendingTab = new FeedTab('trending');
    this.latestTab = new FeedTab('latest');
    this.subscriptionsTab = new FeedTab('subscriptions');

    this.loading = $(".loading");

    this.successCallback = successCallback;

    this.setDefaultTab = function()
    {
        tab = this.sections.attr("data-default");
        if (tab != "trending" && tab != "latest" && tab != "subscriptions") tab = "latest";
        this.setActiveTab(tab);
    }

    this.setActiveTab = function(name)
    {
        if (this.currentTab != null) this.currentTab.setActive(false);

        if (name == "trending")
        {
            this.currentTab = this.trendingTab;
        }
        else if (name == "latest")
        {
            this.currentTab = this.latestTab;
        }
        else
        {
            this.currentTab = this.subscriptionsTab;
        }

        this.currentTab.setActive(true);
    }

    this.listenForTabChange = function()
    {
        this.trendingTab.getElement().click(function() {
            if (feed.currentTab.getName() != "trending")
            {
                feed.reset();
                feed.latestTab.reset();
                feed.subscriptionsTab.reset();
                feed.setActiveTab('trending');
                feed.getTrendingPosts();
                feed.saveTab();
            }
        });

        this.latestTab.getElement().click(function() {
            if (feed.currentTab.getName() != "latest")
            {
                feed.reset();
                feed.trendingTab.reset();
                feed.subscriptionsTab.reset();
                feed.setActiveTab('latest');
                feed.getLatestPosts();
                feed.saveTab();
            }
        });

        this.subscriptionsTab.getElement().click(function() {
            if (feed.currentTab.getName() != "subscriptions")
            {
                feed.reset();
                feed.trendingTab.reset();
                feed.latestTab.reset();
                feed.setActiveTab('subscriptions');
                feed.getSubscriptionsPosts();
                feed.saveTab();
            }
        });
    }

    this.reset = function()
    {
        feed.element.empty();
        feed.scrolledBottom = false;
    }

    this.loadPosts = function()
    {
        $(document)
        .ready(function() {
            if (feed.currentTab.getName() == "trending")
            {
                feed.getTrendingPosts();
            }
            else if (feed.currentTab.getName() == "latest")
            {
                feed.getLatestPosts();
            }
            else
            {
                feed.getSubscriptionsPosts();
            }
        });
    }

    this.loadMoreOnScroll = function()
    {
        $(window).scroll(function() {
            if (!feed.scrolledBottom && $(window).scrollTop() + $(window).height() > $(document).height() - loadDataMinScroll)
            {
                if (feed.currentTab.getName() == "trending" && !feed.trendingTab.hasEnded())
                {
                    feed.trendingTab.incrementPage();
                    feed.getTrendingPosts(true, feed.trendingTab.getPage());
                }
                else if (feed.currentTab.getName() == "latest" && !feed.latestTab.hasEnded())
                {
                    feed.latestTab.incrementPage();
                    feed.getLatestPosts(true, feed.latestTab.getPage());
                }
                else if (feed.currentTab.getName() == "subscriptions" && !feed.subscriptionsTab.hasEnded())
                {

                    feed.subscriptionsTab.incrementPage();
                    feed.getSubscriptionsPosts(true, feed.subscriptionsTab.getPage());
                }

                feed.scrolledBottom = true;
            }
        });
    }

    this.saveTab = function()
    {
        $.ajax({
            type: 'POST',
            url: feed.sections.attr('data-change-feed-tab-url'),
            timeout: shortTimeout,
            data: {
                tab: feed.currentTab.getName(),
            },
        });
    }

    this.getPostsFor = function(type, expand, page)
    {
        expand = expand || false;
        page = page || 1;

        this.loading.show();

        $.ajax({
            type: 'GET',
            url: "?" + type + "=" + page,
            timeout: shortTimeout,
            success: function(data) {
                if (expand)
                {
                    feed.element.append(data.html);
                    feed.scrolledBottom = false;
                }
                else
                {
                    feed.element.prepend(data.html);
                }

                feed[type + "Tab"].setEnded(data.end);
                feed.successCallback();
                feed.loading.hide();
            },
            failure: function() {
                console.warn("Failed to retrieve " + type + " feed.");
            },
        });
    }

    this.getTrendingPosts = function(expand, page)
    {
        this.getPostsFor('trending', expand, page);
    }

    this.getLatestPosts = function(expand, page)
    {
        this.getPostsFor('latest', expand, page);
    }

    this.getSubscriptionsPosts = function(expand, page)
    {
        this.getPostsFor('subscriptions', expand, page);
    }
}
