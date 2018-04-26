var filter, filterBottom = 0, itemContainerBottom = 0;
$(function() {
    filter = $(".section-filter");
    filterBottom = 150 + parseInt(filter.height());
    itemContainerBottom = parseInt($(".section-result").offset().top) + parseInt($(".section-result").height());

    $(".more-category").on("click", function() {
        showDialog($(".dialog-category"));
    });

    $(".more-brands").on("click", function() {
        showDialog($(".dialog-category"));
    });

    if (container.scrollTop() + filterBottom >= itemContainerBottom) {
        filter.removeClass("fixed");
        $(window).on("scroll", filterScrollUp);
    } else {
        filter.addClass("fixed");
        $(window).on("scroll", filterScrollDown);
    }

    $(window).on("resize", function() {
        filter = $(".section-filter");
        filterBottom = 150 + parseInt(filter.height());
        itemContainerBottom = parseInt($(".section-result").offset().top) + parseInt($(".section-result").height());

        if (container.scrollTop() + filterBottom >= itemContainerBottom) {
            filter.removeClass("fixed");
            $(window).on("scroll", filterScrollUp);
        } else {
            filter.addClass("fixed");
            $(window).on("scroll", filterScrollDown);
        }
    });
});

function filterScrollDown() {
    if (container.scrollTop() + filterBottom >= itemContainerBottom) {
        filter.removeClass("fixed");
        $(window).off("scroll", filterScrollDown);
        $(window).on("scroll", filterScrollUp);
    }
}

function filterScrollUp() {
    if (container.scrollTop() + filterBottom < itemContainerBottom) {
        filter.addClass("fixed");
        $(window).off("scroll", filterScrollUp);
        $(window).on("scroll", filterScrollDown);
    }
}