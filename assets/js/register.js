$(function() {
    $(".btn-register").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var valid = true;
            $(".error").html("");

            var name = $(".input-register-name").val().trim();
            var phone = $(".input-register-phone").val().trim();
            var email = $(".input-register-email").val().trim();
            var password = $(".input-register-password").val().trim();

            if (name == "") {
                valid = false;
                $(".error-register-name").html("required");
            }

            if (phone == "") {
                valid = false;
                $(".error-register-phone").html("required");
            }

            if (email == "") {
                valid = false;
                $(".error-register-email").html("required");
            }

            if (password == "") {
                valid = false;
                $(".error-register-password").html("required");
            }

            if (valid) {
                var thisButton = $(this);
                thisButton.addClass("disabled");
                showLoader();
                ajaxCall(do_register_url, {user_name: name, user_handphone: phone, user_email: email, user_password: password}, function(json) {
                    hideLoader();
                    var result = jQuery.parseJSON(json);
                    if (result.status == "success") {
                        window.location.href = thank_you_url + "?email=" + email;
                    } else {
                        thisButton.removeClass("disabled");
                        if (result.message == "duplicate_email") {
                            showNotification("Email sudah ada. Mohon gunakan email lain");
                        } else {
                            showNotification("Gagal Register");
                        }
                    }
                });
            } else {
                showNotification("Silakan periksa inputan");
            }
        }
    });
});