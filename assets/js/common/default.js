var arrScrollFunction = [], arrScrollParallaxFunction = [];
var container = $(window);
var scrollbarWidth = getScrollbarWidth();
var menuOpen = false;

$(function() {
    initializeDefault();
    setScrollAnimFunction();
    setParallaxImage();
    container.scroll();
    
    $(document).on("keydown", "input[data-type='number']", function(e) {
        isNumber(e);
    });

    $(document).on("input", "input[data-thousand-separator='true']", function() {
        var value = parseInt(removeThousandSeparator($(this).val()));
        if (isNaN(value)) {
            value = 0;
        }
        $(this).val(addThousandSeparator(value + ""));
    });

    $(document).on("click", ".radio-container", function() {
        var value = $(this).attr("data-value");
        var name = $(this).attr("data-name");
        $(".radio-container[data-name='" + name + "']").removeClass("active");
        $(".radio-container[data-name='" + name + "'] .radio-text-additional-input").prop("readonly", true);
        $(this).addClass("active").trigger("selected");
        $(this).find(".radio-text-additional-input").prop("readonly", false).focus();
    });

    $(document).on("click", ".checkbox-container", function() {
        if (!$(this).hasClass("active")) {
            $(this).addClass("active");
            $(this).find(".checkbox-text-additional-input").prop("readonly", false).focus();
        } else {
            $(this).removeClass("active");
            $(this).find(".checkbox-text-additional-input").prop("readonly", true);
        }
    });

    $(document).on("click", ".select", function(e) {
        var type = $(this).data("type");
        var selectedDropdown = $(this).find(".dropdown-container");
        
        if (selectedDropdown.hasClass("show")) {
            selectedDropdown.removeClass("show");
        } else {
            selectedDropdown.addClass("show");
        }
        
        e.stopPropagation();
    });

    $(document).on("click", ".dropdown-item", function(e) {
        var select = $(this).closest(".select");
        var data = [].filter.call(this.attributes, function(at) { return /^data-/.test(at.name); });
        var iLength = data.length;
        for (var i = 0; i < iLength; i++) {
            select.attr(data[i].name, data[i].value);
        }
        var text = $(this).html();
        select.find(".select-text").html(text);
        select.trigger("valueChanged");

        var dropdownContainer = $(this).parent();
        dropdownContainer.removeClass("show");
        e.stopPropagation();
    });

    $(".header-menu-icon").on("click", function() {
        if (menuOpen) {
            menuOpen = false;
            $(".menu-icon-line-1").off("webkitAnimationEnd oanimationend msAnimationEnd animationend");
            $("body").addClass("menu-opened menu-inner-opened").removeClass("menu-opening menu-inner-opening").addClass("menu-closing");
            $(".menu-icon-line-1").one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
                $("body").removeClass("menu-closing menu-opened menu-inner-opened show-menu fixed");
            });
        } else {
            menuOpen = true;
            $(".menu-icon-line-1").off("webkitAnimationEnd oanimationend msAnimationEnd animationend");
            $("body").removeClass().addClass("menu-opening show-menu fixed");
            $(".menu-icon-line-1").one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
                $("body").addClass("menu-opened menu-inner-opening").removeClass("menu-opening");
            });
        }
    });

    $(".header-cart, .header-cart-mobile").on("click", function() {
        $("body").addClass("show-cart");
    });

    $(".cart-close-icon").on("click", function() {
        $("body").removeClass("show-cart");
    });

    $(".btn-cart-checkout").on("click", function() {
        window.location.href = checkout_url;
    });

    $(".header-login-text-login").on("click", function() {
        $("body").addClass("show-login");
        $(".input-login-email").focus();
    });

    $(".dark-background").on("click", function() {
        $("body").removeClass("show-cart show-login");
    });

    $(document).on("click", ".dialog-box", function(e) {
        e.stopPropagation();
    });

    $(document).on("click", ".dialog-close-icon, .dialog-background[data-allow-background-close='true']", function() {
        closeDialog($(this).closest(".dialog"));
    });

    $(document).on("keydown", function(e) {
        switch (e.which) {
            case 27:
                closeDialog();
                break;
        }
    });

    $(document).on("click", function(e) {
        var target = $(e.target);
        if (target.closest(".dropdown-container").length == 0) {
            $(".dropdown-container").removeClass("show");
        }
    });

    [].forEach.call(document.querySelectorAll("[data-src]"), function(element) {
        var image = new Image();
        
		if (element.tagName != "IMG") {
			image.onload = function() {
                element.style.backgroundImage = "url('" + image.src + "')";
                $(element).addClass("hide-wrapper");
            };
            image.src = element.getAttribute("data-src");
		} else {
			image.onload = function() {
                $(element).parent().addClass("hide-wrapper");
            };
            image.src = element.getAttribute("src");
		}
    });

    $(window).resize(function() {
        initializeDefault();
        setScrollAnimFunction();
        setParallaxImage();
    });
});

function initializeDefault() {
    vw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    vh = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    if (vw < 1025) {
        isMobile = true;
        if (vw >= 768) {
            isTablet = true;
        } else {
            isTablet = false;
        }
    } else {
        isMobile = false;
    }
}

function showDialog(dialogElement) {
    dialogElement.addClass("show");
    dialogElement.trigger("dialogShown");
}

function closeDialog(element) {
    if (element == null) {
        element = $(".dialog");
    }
    element.removeClass("show");
    element.trigger("dialogClosed");
}

function isNumber(e) {
	if (e.key.length == 1) {
		if ("0123456789".indexOf(e.key) < 0) {
			e.preventDefault();
		}
	}
}

function addThousandSeparator(nStr) {
    nStr = nStr.replace(/,/g, "");
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function removeThousandSeparator(str) {
    return str.replace(/\./g,'');
}

function pad(pad, str, padLeft) {
    if (typeof str === 'undefined') 
        return pad;
    if (padLeft) {
        return (pad + str).slice(-pad.length);
    } else {
        return (str + pad).substring(0, pad.length);
    }
}

function ajaxCall(url, data, callback) {
	return $.ajax({
		url: url,
		data: data,
		type: 'POST',
		error: function(jqXHR, exception) {
			if (exception != "abort") {
				console.log(jqXHR + " : " + jqXHR.responseText);
			}
		},
		success: function(result) {
			callback(result);
		}
	});
}

function checkInputNumber(element) {
    var value = parseInt($(element).val());
    if (value <= 0 || isNaN(value)) {
        $(element).val(1);
    } else if (value > 999) {
        $(element).val(999);
    }
}

function setScrollAnimFunction() {
    var animOffset = 70;
    if (isMobile && !isTablet) {
        animOffset = 20;
    }

    var iLength = arrScrollFunction.length;
    for (var i = 0; i < iLength; i++) {
        container.off("scroll", arrScrollFunction[i]);
    }

    var animElement = $("[data-anim-threshold='self']");
    var animElementLength = animElement.length;
	var lastThreshold = -1, lastDelay = 0;
	for (var i = 0; i < animElementLength; i++) {
		var animElementItem = animElement.eq(i);
        var itemThreshold = animElementItem.offset().top + 50;
		if (itemThreshold == lastThreshold) {
			lastDelay += 0.1;
		} else {
			lastThreshold = itemThreshold;
			lastDelay = 0;
		}

        var arrScrollFunctionIndex = arrScrollFunction.length;
        (function(item, threshold, index, delay) {
			var scrollFunction = function() {
				if (container.scrollTop() + vh >= threshold) {
					item[0].style.WebkitAnimationDelay = delay + "s";
					item[0].style.animationDelay = delay + "s";
					item.addClass("show");

					container.off("scroll", arrScrollFunction[index]);
				}
			};
			container.on("scroll", scrollFunction);
			arrScrollFunction.push(scrollFunction);
        })(animElementItem, itemThreshold, arrScrollFunctionIndex, lastDelay);
	}
}

function setParallaxImage() {
    if (!isMobile) {
        var iLength = arrScrollParallaxFunction.length;
        for (var i = 0; i < iLength; i++) {
            container.off("scroll", arrScrollParallaxFunction[i]);
        }

        var animElement = $("[data-parallax-image='true']");
        var animElementLength = animElement.length;
        for (var i = 0; i < animElementLength; i++) {
            var animElementItem = animElement.eq(i);
            var itemThreshold = animElementItem.offset().top + vh / 2 - parseInt(animElementItem.height());

            var arrScrollFunctionIndex = arrScrollParallaxFunction.length;
            (function(item, threshold, index) {
                var scrollFunction = function() {
                    var selisih = -1 * (threshold - container.scrollTop()) / 3;
                    item[0].style.marginTop = selisih + "px";
                };
                container.on("scroll", scrollFunction);
                arrScrollFunction.push(scrollFunction);
            })(animElementItem.find("img"), itemThreshold, arrScrollFunctionIndex);
        }
    }
}

function showNotification(text) {
    var notification = $(".notification");
    notification.html(text);
    notification.off("webkitAnimationEnd oanimationend msAnimationEnd animationend");
    notification.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
        notification.removeClass("showing");
    });

    notification.removeClass("showing");
    setTimeout(function() {
        notification.addClass("showing");
    }, 1);
}

function clearInputFile(input) {
    input.value = ''

    if (!/safari/i.test(navigator.userAgent)) {
        input.type = ''
        input.type = 'file'
    }
}

function addClass(el, className) {
    if (el.classList)
        el.classList.add(className);
    else
        el.className += ' ' + className;
}

function getScrollbarWidth() {
    var outer = document.createElement("div");
    outer.style.visibility = "hidden";
    outer.style.width = "100px";
    outer.style.msOverflowStyle = "scrollbar"; // needed for WinJS apps

    document.body.appendChild(outer);

    var widthNoScroll = outer.offsetWidth;
    // force scrollbars
    outer.style.overflow = "scroll";

    // add innerdiv
    var inner = document.createElement("div");
    inner.style.width = "100%";
    outer.appendChild(inner);        

    var widthWithScroll = inner.offsetWidth;

    // remove divs
    outer.parentNode.removeChild(outer);

    return widthNoScroll - widthWithScroll;
}