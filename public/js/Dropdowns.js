function Dropdowns()
{
    this.dropdowns          = this;
    this.className          = "dropdown";
    this.buttonClassName    = "button";
    this.itemsClassName     = "items";
    this.itemClickClass     = "clicked";

    this.register = function()
    {
        $("." + dropdowns.className).each(function() {
            dropdown = $(this);
            button = $(this).find("." + dropdowns.buttonClassName);

            button.click(function(event) {
                dropdowns.click(event, $(this));
            });
        });
    }

    this.click = function(event, item) {
        event.preventDefault();
        item.toggleClass(this.itemClickClass);

        items = item.parent().find("." + this.itemsClassName);

        items.slideToggle(200, function() {
            if ($(this).css('display') == 'block') $(this).css('display', 'flex');
        });

        items.css('right', '');

        if (item.hasClass(this.itemClickClass) && !items.visible())
            items.css('right', '0');

    }
    this.open = function(dropdown)
    {
        dropdown.find("." + this.buttonClassName).toggleClass(this.itemClickClass);
        items = dropdown.find("." + this.itemsClassName);
        items.css('display', 'flex');
    }
}
