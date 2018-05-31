$(function() {
    $(".btn-confirm-order").on("click", function() {
        var valid = true;
        var name = $(".input-shipping-name").val().trim();
        var address = $(".input-shipping-address").val().trim();
        var city = $(".input-shipping-city").val().trim();
        var phone = $(".input-shipping-phone").val();

        if (name == "") {
            valid = false;
            $(".error-shipping-name").html("required");
        }

        if (address == "") {
            valid = false;
            $(".error-shipping-address").html("required");
        }

        if (city == "") {
            valid = false;
            $(".error-shipping-city").html("required");
        }

        if (phone == "") {
            valid = false;
            $(".error-shipping-phone").html("required");
        }

        if (valid) {
            window.location.href = payment_url;
        } else {
            showNotification("Silakan periksa inputan");
        }
    });
});