var filter, filterBottom = 0, itemContainerBottom = 0;
$(function() {
    filter = $(".section-filter");
    filterBottom = 150 + parseInt(filter.height());
    itemContainerBottom = parseInt($(".section-result").offset().top) + parseInt($(".section-result").height());
    inputOnChange();

    $(".section-filter").on("click", function() {
        if (isMobile) {
            $("body").addClass("show-filter-content");
        }
    });

    $(".filter-close-icon").on("click", function(e) {
        $("body").removeClass("show-filter-content");
        e.stopPropagation();
    });

    $(".filter-content").on("click", function(e) {
        e.stopPropagation();
    });

    $(".more-category").on("click", function() {
        showDialog($(".dialog-category"));
    });

    $(".more-brands").on("click", function() {
        showDialog($(".dialog-brand"));
    });

    if (container.scrollTop() + filterBottom >= itemContainerBottom) {
        filter.removeClass("fixed");
        $(window).on("scroll", filterScrollUp);
    } else {
        filter.addClass("fixed");
        $(window).on("scroll", filterScrollDown);
    }
    
    $(".btn-qty-minus").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var value = parseInt($(".input-qty").val());
            value--;
            $(".input-qty").val(value);

            inputOnChange();
        }
    });

    $(".btn-qty-plus").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var value = parseInt($(".input-qty").val());
            value++;
            $(".input-qty").val(value);

            inputOnChange();
        }
    });

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

function inputOnChange() {
    var value = parseInt($(".input-qty").val());
    if (value <= 1) {
        $(".btn-qty-minus").addClass("disabled");
    } else {
        $(".btn-qty-minus").removeClass("disabled");
    }
}

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