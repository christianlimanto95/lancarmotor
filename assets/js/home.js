var header;
var loading = 0, loadingElement;

$(function() {
    loadingElement = $(".preloader-percentage");
    setLoading(0);

    header = $(".header");
    if (container.scrollTop() >= 5) {
        header.removeClass("transparent");
        container.on("scroll", check_header_scroll_up);
    } else {
        container.on("scroll", check_header_scroll_down);
    }

    $(".btn-add-to-cart").on("click", function() {
        var item = $(this).closest(".item");
        var id = item.attr("data-id");
        var name = item.attr("data-name");
        var price = item.attr("data-price");
        var image = item.find(".item-image").attr("data-src");

        var dialog = $(".dialog-add-to-cart");
        dialog.attr("data-id", id);
        dialog.find(".dialog-cart-image").css("background-image", "url(" + image + ")");
        dialog.find(".dialog-cart-name").html(name);
        dialog.find(".dialog-cart-price").html("Rp " + addThousandSeparator(price) + ",-");
        showDialog(dialog);
    });
});

function setLoading(threshold) {
    $("body").scrollTop(0);
    if (threshold == 0) {
        setTimeout(() => {
            threshold = Math.floor((Math.random() * 30) + 30);
            addLoadingPercentage(10, threshold);
        }, Math.floor(Math.random() * 300));
    } else if (threshold >= 30 && threshold <= 60) {
        setTimeout(function() {
            threshold = Math.floor((Math.random() * 20) + 60);
            addLoadingPercentage(10, threshold);
        }, Math.floor((Math.random() * 500) + 200));
    } else if (threshold < 100) {
        setTimeout(function() {
            threshold = 100;
            addLoadingPercentage(10, threshold);
        }, Math.floor((Math.random() * 500) + 200));
    } else {
        $("body").addClass("hide-preloading");
        $(".preloader-splitter-left").one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
            $("body").removeClass("preloading hide-preloading");
        });
    }
}

function addLoadingPercentage(interval, threshold) {
    setTimeout(function() {
        loading++;
        loadingElement.html(loading + "%");
        if (loading < threshold) {
            addLoadingPercentage(interval, threshold);
        } else {
            setLoading(threshold);
        }
    }, interval);
}

function check_header_scroll_down() {
    if (container.scrollTop() > 5) {
        header.removeClass("transparent");
        container.off("scroll", check_header_scroll_down);
        container.on("scroll", check_header_scroll_up);
    }
}

function check_header_scroll_up() {
    if (container.scrollTop() <= 5) {
        header.addClass("transparent");
        container.off("scroll", check_header_scroll_up);
        container.on("scroll", check_header_scroll_down);
    }
}