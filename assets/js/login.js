$(function() {
    $(".btn-login").on("click", function() {
        do_the_login();
    });

    $(".input-email, .input-password").on("keydown", function(e) {
        if (e.which == 13) {
            e.preventDefault();
            e.stopPropagation();
            do_the_login();
        }
    });
});

function do_the_login() {
    if (!$(".btn-login").hasClass("disabled")) {
        var thisButton = $(".btn-login");
        var email = $(".input-email").val();
        var password = $(".input-password").val();
        var valid = true;
        $(".error").html("");
        if (email == "") {
            valid = false;
            $(".error-email").html("required");
        }
        if (password == "") {
            valid = false;
            $(".error-password").html("required");
        }

        if (valid) {
            thisButton.addClass("disabled");
            showLoader();

            ajaxCall(login_url, {email: email, password: password}, function(json) {
                hideLoader();
                var result = jQuery.parseJSON(json);
                if (result.status == "success") {
                    window.location.reload();
                } else {
                    thisButton.removeClass("disabled");
                    showNotification("Gagal Login");
                }
            });
        }
    }
}