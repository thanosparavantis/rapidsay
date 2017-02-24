function FeedTab(name)
{
    this.name = name;
    this.element = $("#" + name);
    this.page = 1;
    this.end = false;

    this.getName = function()
    {
        return this.name;
    }

    this.getElement = function()
    {
        return this.element;
    }

    this.getPage = function()
    {
        return this.page;
    }

    this.incrementPage = function()
    {
        this.page++;
        return this;
    }

    this.hasEnded = function()
    {
        return this.end;
    }

    this.setEnded = function(flag)
    {
        this.end = flag;
        return this;
    }

    this.setActive = function(flag)
    {
        if (flag)
        {
            this.element.addClass("active");
        }
        else
        {
            this.element.removeClass("active");
        }
    }

    this.reset = function()
    {
        this.page = 1;
        this.end = false;
        return this;
    }
}
