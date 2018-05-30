var filter, filterBottom = 0, itemContainerBottom = 0;
$(function() {
    filter = $(".section-filter");
    filterBottom = 150 + parseInt(filter.height());
    itemContainerBottom = parseInt($(".section-result").offset().top) + parseInt($(".section-result").height());

    $(".input-name").on("blur", function() {
        get_item();
    });

    $(".input-name").on("keydown", function(e) {
        if (e.which == 13) {
            $(this).blur();
        }
    });

    var chosen_category = $(".chosen-category").attr("data-value");
    var each = chosen_category.split(",");
    var iLength = each.length;
    for (var i = 0; i < iLength; i++) {
        setCheckboxChecked($(".category-checkbox-container[data-value='" + each[i] + "']"));
        setCheckboxChecked($(".dialog-category-checkbox-container[data-value='" + each[i] + "']"));
    }

    var chosen_brand = $(".chosen-brand").attr("data-value");
    var each = chosen_brand.split(",");
    var iLength = each.length;
    for (var i = 0; i < iLength; i++) {
        setCheckboxChecked($(".brand-checkbox-container[data-value='" + each[i] + "']"));
        setCheckboxChecked($(".dialog-brand-checkbox-container[data-value='" + each[i] + "']"));
    }

    $(".brand-checkbox-container").on("checkboxChecked", function() {
        var value = $(this).attr("data-value");
        setCheckboxUnchecked($(".dialog-brand-checkbox-container[data-value='0']"));
        setCheckboxChecked($(".dialog-brand-checkbox-container[data-value='" + value + "']"));
        add_brand_selection(value);
    });

    $(".dialog-brand-checkbox-container").on("checkboxChecked", function() {
        var value = $(this).attr("data-value");
        if (value == "0") {
            setCheckboxUnchecked($(".brand-checkbox-container"));
            setCheckboxUnchecked($(".dialog-brand-checkbox-container:not([data-value='0'])"));
            $(".chosen-brand").attr("data-value", "");
            get_item();
        } else {
            setCheckboxUnchecked($(".dialog-brand-checkbox-container[data-value='0']"));
            setCheckboxChecked($(".brand-checkbox-container[data-value='" + value + "']"));
            add_brand_selection(value);
        }
    });

    $(".brand-checkbox-container").on("checkboxUnchecked", function() {
        var value = $(this).attr("data-value");
        setCheckboxUnchecked($(".dialog-brand-checkbox-container[data-value='" + value + "']"));
        remove_brand_selection(value);
    });

    $(".dialog-brand-checkbox-container").on("checkboxUnchecked", function() {
        var value = $(this).attr("data-value");
        setCheckboxUnchecked($(".brand-checkbox-container[data-value='" + value + "']"));
        remove_brand_selection(value);
    });

    $(".category-checkbox-container").on("checkboxChecked", function() {
        var value = $(this).attr("data-value");
        setCheckboxUnchecked($(".dialog-category-checkbox-container[data-value='0']"));
        setCheckboxChecked($(".dialog-category-checkbox-container[data-value='" + value + "']"));
        add_category_selection(value);
    });

    $(".dialog-category-checkbox-container").on("checkboxChecked", function() {
        var value = $(this).attr("data-value");
        if (value == "0") {
            $(".chosen-category").attr("data-value", "");
            setCheckboxUnchecked($(".category-checkbox-container"));
            setCheckboxUnchecked($(".dialog-category-checkbox-container:not([data-value='0'])"));
            get_item();
        } else {
            setCheckboxUnchecked($(".dialog-category-checkbox-container[data-value='0']"));
            setCheckboxChecked($(".category-checkbox-container[data-value='" + value + "']"));
            add_category_selection(value);
        }
    });

    $(".category-checkbox-container").on("checkboxUnchecked", function() {
        var value = $(this).attr("data-value");
        setCheckboxUnchecked($(".dialog-category-checkbox-container[data-value='" + value + "']"));
        remove_category_selection(value);
    });

    $(".dialog-category-checkbox-container").on("checkboxUnchecked", function() {
        var value = $(this).attr("data-value");
        setCheckboxUnchecked($(".category-checkbox-container[data-value='" + value + "']"));
        remove_category_selection(value);
    });

    $(".section-filter").on("click", function() {
        if (isMobile) {
            $("body").addClass("show-filter-content");
        }
    });

    $(".filter-close-icon").on("click", function(e) {
        $("body").removeClass("show-filter-content");
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

function add_brand_selection(brand_id) {
    var brands = $(".chosen-brand").attr("data-value");
    var brand_each = brands.split(",");
    if (brand_each.indexOf(brand_id) == -1) {
        if (brands != "") {
            brands += ",";
        }
        brands += brand_id;
    }
    $(".chosen-brand").attr("data-value", brands);
    get_item();
}

function remove_brand_selection(brand_id) {
    var brands = $(".chosen-brand").attr("data-value");
    var brand_each = brands.split(",");
    var new_brands = "";
    var iLength = brand_each.length;
    for (var i = 0; i < iLength; i++) {
        if (brand_each[i] != brand_id) {
            if (new_brands != "") {
                new_brands += ",";
            }
            new_brands += brand_each[i];
        }
    }
    $(".chosen-brand").attr("data-value", new_brands);
    get_item();
}

function add_category_selection(category_id) {
    var categories = $(".chosen-category").attr("data-value");
    var category_each = categories.split(",");
    if (category_each.indexOf(category_id) == -1) {
        if (categories != "") {
            categories += ",";
        }
        categories += category_id;
    }
    $(".chosen-category").attr("data-value", categories);
    get_item();
}

function remove_category_selection(category_id) {
    var categories = $(".chosen-category").attr("data-value");
    var category_each = categories.split(",");
    var new_categories = "";
    var iLength = category_each.length;
    for (var i = 0; i < iLength; i++) {
        if (category_each[i] != category_id) {
            if (new_categories != "") {
                new_categories += ",";
            }
            new_categories += category_each[i];
        }
    }
    $(".chosen-category").attr("data-value", new_categories);
    get_item();
}

function get_item() {
    showLoader();
    var query_url = "";

    var brands = $(".chosen-brand").attr("data-value");
    if (brands != "") {
        if (query_url == "") {
            query_url += "?";
        }
        query_url += "brand=" + brands;
    }

    var category = $(".chosen-category").attr("data-value");
    if (category != "") {
        if (query_url == "") {
            query_url += "?";
        } else {
            query_url += "&";
        }
        query_url += "category=" + category;
    }

    var keyword = $(".input-name").val().trim();
    if (keyword != "") {
        if (query_url == "") {
            query_url += "?";
        } else {
            query_url += "&";
        }
        query_url += "keyword=" + keyword;
    }

    history.replaceState(null, null, "shop" + query_url);
    ajaxCall(get_item_url, {brand: brands, category: category, keyword: keyword}, function(json) {
        hideLoader();
        var result = jQuery.parseJSON(json);
        if (result.status == "success") {
            var data = result.data;
            var iLength = data.length;
            var element = "";
            for (var i = 0; i < iLength; i++) {
                element += "<div class='item'>";
                element += "<a href='" + data[i].item_url + "' class='item-image' data-src='" + data[i].src + "'></a>";
                element += "<div class='item-name'>" + data[i].item_name + "</div>";
                element += "<div class='item-price'>Rp " + addThousandSeparator(data[i].item_price + "") + ",-</div>";
                element += "<div class='item-button-container'>";
                element += "<div class='button item-button btn-add-to-cart'>";
                element += "<div class='button-text'>Add to Cart</div>";
                element += "</div>";
                element += "<div class='button item-button btn-buy-now'>";
                element += "<div class='button-text'>Buy Now</div>";
                element += "</div>";
                element += "</div>";
                element += "</div>";
            }

            $(".item-container").html(element);
            itemContainerBottom = parseInt($(".section-result").offset().top) + parseInt($(".section-result").height());
            container.scroll();
            imagePreloader();
        }
    });
}