var header;

$(function() {
    header = $(".header");
    if (container.scrollTop() >= 5) {
        header.removeClass("transparent");
        container.on("scroll", check_header_scroll_up);
    } else {
        container.on("scroll", check_header_scroll_down);
    }
});

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