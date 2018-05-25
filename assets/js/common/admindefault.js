$(function() {
    $(document).on("keydown", "input[data-type='number']", function(e) {
        isNumber(e);
    });

    $(document).on("keydown", "input[data-type='date']", function(e) {
        isNumberWithDash(e);
    });

    $(document).on("input", "input[data-thousand-separator='true']", function() {
        var value = parseInt(removeThousandSeparator($(this).val()));
        if (isNaN(value)) {
            value = 0;
        }
        $(this).val(addCommas(value + ""));
    });

    $(document).on("click", ".radio-container", function() {
        var value = $(this).attr("data-value");
        var name = $(this).attr("data-name");
        $(".radio-container[data-name='" + name + "']").removeClass("active");
        $(".radio-container[data-name='" + name + "'] .radio-text-additional-input").prop("readonly", true);
        $(this).addClass("active");
        $(this).find(".radio-text-additional-input").prop("readonly", false).focus();
        $(this).trigger("radioEnabled");
    });

    $(document).on("click", ".checkbox-container", function() {
        if (!$(this).hasClass("active")) {
            $(this).addClass("active");
            $(this).find(".checkbox-text-additional-input").prop("readonly", false).focus();
            $(this).trigger("checkboxEnabled");
        } else {
            $(this).removeClass("active");
            $(this).find(".checkbox-text-additional-input").prop("readonly", true);
            $(this).trigger("checkboxDisabled");
        }
    });
    
    $(document).on("click", ".select", function(e) {
        var type = $(this).data("type");
        var selectedDropdown = $(this).find(".dropdown-container");
        
        if (selectedDropdown.hasClass("show")) {
            $(".dropdown-container").removeClass("show");
        } else {
            $(".dropdown-container").removeClass("show");
            selectedDropdown.addClass("show");
        }
        
        e.stopPropagation();
    });

    $(document).on("click", ".admin-menu-icon", function(e) {
        if ($(".admin-menu-container").hasClass("show")) {
            $(".admin-menu-container").removeClass("show");
        } else {
            $(".admin-menu-container").addClass("show");
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
        select.find(".select-input").val($(this).attr("data-value"));
        select.trigger("valueChanged");

        var dropdownContainer = $(this).parent();
        dropdownContainer.removeClass("show");
        e.stopPropagation();
    });

    $(".image-input-upload").on("change", function() {
        var formRight = $(this).closest(".form-right");
		var previewElement = formRight.find(".image-preview");
		if (this.files.length > 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
                formRight.addClass("image-added");
                previewElement.attr("src", e.target.result);
                $(".image-input").val(e.target.result);
			};
            reader.readAsDataURL(this.files[0]);
		}
    });

    $(".btn-delete-image").on("click", function() {
        var formRight = $(this).closest(".form-right");
        deleteImage(formRight);
    });

    $(document).on("click", function(e) {
        var target = $(e.target);
        if (target.closest(".dropdown-container").length == 0) {
            $(".dropdown-container").removeClass("show");
        }
        if (target.closest(".admin-menu-container").length == 0) {
            $(".admin-menu-container").removeClass("show");
        }
    });

    $(document).on("click", ".dialog-close-icon, .btn-dialog-cancel", function() {
        var dialogElement = $(this).closest(".dialog");
        closeDialog(dialogElement);
    });

    $(window).on("keydown", function(e) {
        switch (e.which) {
            case 27: // ESC
                closeDialog();
                break;
        }
    });
});

function deleteImage(formRight) {
    var previewElement = formRight.find(".image-preview");
    var input = formRight.find(".image-input-upload");
    clearInputFile(input[0]);
    formRight.find(".image-input").val("");
    previewElement.removeAttr("src");
    formRight.removeClass("image-added");
}

function toDataURL(url, callback, temp) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
            callback(reader.result, temp);
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
}

function isNumber(e) {
	if (e.key.length == 1) {
		if ("0123456789".indexOf(e.key) < 0) {
			e.preventDefault();
		}
	}
}

function isNumberWithDash(e) {
	if (e.key.length == 1) {
		if ("0123456789-".indexOf(e.key) < 0) {
			e.preventDefault();
		}
	}
}

function addCommas(nStr) {
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

function clearInputFile(input) {
    input.value = ''

    if (!/safari/i.test(navigator.userAgent)) {
        input.type = ''
        input.type = 'file'
    }
}

function setSelectValue(select, value) {
    var dropdownItem = select.find(".dropdown-item[data-value='" + value + "']")[0];
    var data = [].filter.call(dropdownItem.attributes, function(at) { return /^data-/.test(at.name); });
    var iLength = data.length;
    for (var i = 0; i < iLength; i++) {
        select.attr(data[i].name, data[i].value);
    }
    var text = $(dropdownItem).html();
    select.find(".select-text").html(text);
    select.find(".select-input").val($(dropdownItem).attr("data-value"));
    select.trigger("valueChanged");
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

function removeAllErrors() {
    $(".error").html("");
}

function showLoader() {
    $(".loader").addClass("show");
}

function hideLoader() {
    $(".loader").removeClass("show");
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

function strtotime (text, now) {
    //  discuss at: http://locutus.io/php/strtotime/
    // original by: Caio Ariede (http://caioariede.com)
    // improved by: Kevin van Zonneveld (http://kvz.io)
    // improved by: Caio Ariede (http://caioariede.com)
    // improved by: A. Matías Quezada (http://amatiasq.com)
    // improved by: preuter
    // improved by: Brett Zamir (http://brett-zamir.me)
    // improved by: Mirko Faber
    //    input by: David
    // bugfixed by: Wagner B. Soares
    // bugfixed by: Artur Tchernychev
    // bugfixed by: Stephan Bösch-Plepelits (http://github.com/plepe)
    //      note 1: Examples all have a fixed timestamp to prevent
    //      note 1: tests to fail because of variable time(zones)
    //   example 1: strtotime('+1 day', 1129633200)
    //   returns 1: 1129719600
    //   example 2: strtotime('+1 week 2 days 4 hours 2 seconds', 1129633200)
    //   returns 2: 1130425202
    //   example 3: strtotime('last month', 1129633200)
    //   returns 3: 1127041200
    //   example 4: strtotime('2009-05-04 08:30:00 GMT')
    //   returns 4: 1241425800
    //   example 5: strtotime('2009-05-04 08:30:00+00')
    //   returns 5: 1241425800
    //   example 6: strtotime('2009-05-04 08:30:00+02:00')
    //   returns 6: 1241418600
    //   example 7: strtotime('2009-05-04T08:30:00Z')
    //   returns 7: 1241425800
  
    var parsed
    var match
    var today
    var year
    var date
    var days
    var ranges
    var len
    var times
    var regex
    var i
    var fail = false
  
    if (!text) {
      return fail
    }
  
    // Unecessary spaces
    text = text.replace(/^\s+|\s+$/g, '')
      .replace(/\s{2,}/g, ' ')
      .replace(/[\t\r\n]/g, '')
      .toLowerCase()
  
    // in contrast to php, js Date.parse function interprets:
    // dates given as yyyy-mm-dd as in timezone: UTC,
    // dates with "." or "-" as MDY instead of DMY
    // dates with two-digit years differently
    // etc...etc...
    // ...therefore we manually parse lots of common date formats
    var pattern = new RegExp([
      '^(\\d{1,4})',
      '([\\-\\.\\/:])',
      '(\\d{1,2})',
      '([\\-\\.\\/:])',
      '(\\d{1,4})',
      '(?:\\s(\\d{1,2}):(\\d{2})?:?(\\d{2})?)?',
      '(?:\\s([A-Z]+)?)?$'
    ].join(''))
    match = text.match(pattern)
  
    if (match && match[2] === match[4]) {
      if (match[1] > 1901) {
        switch (match[2]) {
          case '-':
            // YYYY-M-D
            if (match[3] > 12 || match[5] > 31) {
              return fail
            }
  
            return new Date(match[1], parseInt(match[3], 10) - 1, match[5],
            match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
          case '.':
            // YYYY.M.D is not parsed by strtotime()
            return fail
          case '/':
            // YYYY/M/D
            if (match[3] > 12 || match[5] > 31) {
              return fail
            }
  
            return new Date(match[1], parseInt(match[3], 10) - 1, match[5],
            match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
        }
      } else if (match[5] > 1901) {
        switch (match[2]) {
          case '-':
            // D-M-YYYY
            if (match[3] > 12 || match[1] > 31) {
              return fail
            }
  
            return new Date(match[5], parseInt(match[3], 10) - 1, match[1],
            match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
          case '.':
            // D.M.YYYY
            if (match[3] > 12 || match[1] > 31) {
              return fail
            }
  
            return new Date(match[5], parseInt(match[3], 10) - 1, match[1],
            match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
          case '/':
            // M/D/YYYY
            if (match[1] > 12 || match[3] > 31) {
              return fail
            }
  
            return new Date(match[5], parseInt(match[1], 10) - 1, match[3],
            match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
        }
      } else {
        switch (match[2]) {
          case '-':
            // YY-M-D
            if (match[3] > 12 || match[5] > 31 || (match[1] < 70 && match[1] > 38)) {
              return fail
            }
  
            year = match[1] >= 0 && match[1] <= 38 ? +match[1] + 2000 : match[1]
            return new Date(year, parseInt(match[3], 10) - 1, match[5],
            match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
          case '.':
            // D.M.YY or H.MM.SS
            if (match[5] >= 70) {
              // D.M.YY
              if (match[3] > 12 || match[1] > 31) {
                return fail
              }
  
              return new Date(match[5], parseInt(match[3], 10) - 1, match[1],
              match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
            }
            if (match[5] < 60 && !match[6]) {
              // H.MM.SS
              if (match[1] > 23 || match[3] > 59) {
                return fail
              }
  
              today = new Date()
              return new Date(today.getFullYear(), today.getMonth(), today.getDate(),
              match[1] || 0, match[3] || 0, match[5] || 0, match[9] || 0) / 1000
            }
  
            // invalid format, cannot be parsed
            return fail
          case '/':
            // M/D/YY
            if (match[1] > 12 || match[3] > 31 || (match[5] < 70 && match[5] > 38)) {
              return fail
            }
  
            year = match[5] >= 0 && match[5] <= 38 ? +match[5] + 2000 : match[5]
            return new Date(year, parseInt(match[1], 10) - 1, match[3],
            match[6] || 0, match[7] || 0, match[8] || 0, match[9] || 0) / 1000
          case ':':
            // HH:MM:SS
            if (match[1] > 23 || match[3] > 59 || match[5] > 59) {
              return fail
            }
  
            today = new Date()
            return new Date(today.getFullYear(), today.getMonth(), today.getDate(),
            match[1] || 0, match[3] || 0, match[5] || 0) / 1000
        }
      }
    }
  
    // other formats and "now" should be parsed by Date.parse()
    if (text === 'now') {
      return now === null || isNaN(now)
        ? new Date().getTime() / 1000 | 0
        : now | 0
    }
    if (!isNaN(parsed = Date.parse(text))) {
      return parsed / 1000 | 0
    }
    // Browsers !== Chrome have problems parsing ISO 8601 date strings, as they do
    // not accept lower case characters, space, or shortened time zones.
    // Therefore, fix these problems and try again.
    // Examples:
    //   2015-04-15 20:33:59+02
    //   2015-04-15 20:33:59z
    //   2015-04-15t20:33:59+02:00
    pattern = new RegExp([
      '^([0-9]{4}-[0-9]{2}-[0-9]{2})',
      '[ t]',
      '([0-9]{2}:[0-9]{2}:[0-9]{2}(\\.[0-9]+)?)',
      '([\\+-][0-9]{2}(:[0-9]{2})?|z)'
    ].join(''))
    match = text.match(pattern)
    if (match) {
      // @todo: time zone information
      if (match[4] === 'z') {
        match[4] = 'Z'
      } else if (match[4].match(/^([+-][0-9]{2})$/)) {
        match[4] = match[4] + ':00'
      }
  
      if (!isNaN(parsed = Date.parse(match[1] + 'T' + match[2] + match[4]))) {
        return parsed / 1000 | 0
      }
    }
  
    date = now ? new Date(now * 1000) : new Date()
    days = {
      'sun': 0,
      'mon': 1,
      'tue': 2,
      'wed': 3,
      'thu': 4,
      'fri': 5,
      'sat': 6
    }
    ranges = {
      'yea': 'FullYear',
      'mon': 'Month',
      'day': 'Date',
      'hou': 'Hours',
      'min': 'Minutes',
      'sec': 'Seconds'
    }
  
    function lastNext (type, range, modifier) {
      var diff
      var day = days[range]
  
      if (typeof day !== 'undefined') {
        diff = day - date.getDay()
  
        if (diff === 0) {
          diff = 7 * modifier
        } else if (diff > 0 && type === 'last') {
          diff -= 7
        } else if (diff < 0 && type === 'next') {
          diff += 7
        }
  
        date.setDate(date.getDate() + diff)
      }
    }
  
    function process (val) {
      // @todo: Reconcile this with regex using \s, taking into account
      // browser issues with split and regexes
      var splt = val.split(' ')
      var type = splt[0]
      var range = splt[1].substring(0, 3)
      var typeIsNumber = /\d+/.test(type)
      var ago = splt[2] === 'ago'
      var num = (type === 'last' ? -1 : 1) * (ago ? -1 : 1)
  
      if (typeIsNumber) {
        num *= parseInt(type, 10)
      }
  
      if (ranges.hasOwnProperty(range) && !splt[1].match(/^mon(day|\.)?$/i)) {
        return date['set' + ranges[range]](date['get' + ranges[range]]() + num)
      }
  
      if (range === 'wee') {
        return date.setDate(date.getDate() + (num * 7))
      }
  
      if (type === 'next' || type === 'last') {
        lastNext(type, range, num)
      } else if (!typeIsNumber) {
        return false
      }
  
      return true
    }
  
    times = '(years?|months?|weeks?|days?|hours?|minutes?|min|seconds?|sec' +
      '|sunday|sun\\.?|monday|mon\\.?|tuesday|tue\\.?|wednesday|wed\\.?' +
      '|thursday|thu\\.?|friday|fri\\.?|saturday|sat\\.?)'
    regex = '([+-]?\\d+\\s' + times + '|' + '(last|next)\\s' + times + ')(\\sago)?'
  
    match = text.match(new RegExp(regex, 'gi'))
    if (!match) {
      return fail
    }
  
    for (i = 0, len = match.length; i < len; i++) {
      if (!process(match[i])) {
        return fail
      }
    }
  
    return (date.getTime() / 1000)
  }