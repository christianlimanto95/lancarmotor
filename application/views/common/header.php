<html>
<head>
	<title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url("assets/icons/favicon.png"); ?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo base_url("assets/icons/logo.png"); ?>" />
    <meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
	<?php if (isset($meta_description)) {
        echo "<meta name='description' content='" . $meta_description . "' />";
        echo "<meta name='og:description' content='" . $meta_description . "' />";
    } ?>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="702991525631-258gshg35oef1lfhnt21hohro5rjito9.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css?v=9"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css?v=34"); ?>" />
    <?php echo $additional_css; ?>
    <style>
        @font-face {
			font-family: helvetica-thin;
			src: url(<?php echo base_url("assets/fonts/HelveticaNeueLTPro-Cn.woff"); ?>);
        }
        
        @font-face {
			font-family: helvetica-thin-bold;
			src: url(<?php echo base_url("assets/fonts/HelveticaNeueLTPro-MdCn.woff"); ?>);
		}
    </style>
</head>
<body class="preloading">
<div class="loader">
    <svg class="loader-circular">
        <circle class="loader-circular-path" cx="50" cy="50" r="30" fill="none" stroke-width="6" stroke-miterlimit="10"/>
    </svg>
</div>
<div class="notification"></div>
<div class="header<?php echo $header_additional_class; ?>">
    <a href="<?php echo base_url(); ?>" class="logo" style="background-image: url(<?php echo base_url("assets/icons/logo_white.png"); ?>);"></a>
    <div class="header-menu-container">
        <a href="<?php echo base_url(); ?>" class="header-menu<?php echo $header_menu["home"]; ?>" >HOME</a>
        <a href="<?php echo base_url("shop"); ?>" class="header-menu<?php echo $header_menu["shop"]; ?>" >SHOP</a>
        <a href="<?php echo base_url("about"); ?>" class="header-menu<?php echo $header_menu["about"]; ?>" >ABOUT</a>
        <a href="<?php echo base_url("contact-us"); ?>" class="header-menu<?php echo $header_menu["contact"]; ?>" >CONTACT US</a>
    </div>
    <div class="header-search" style="background-image: url(<?php echo base_url("assets/icons/search_icon.png"); ?>);"></div>
    <?php if (!$hide_cart) { ?>
        <div class="header-cart">
            <div class="header-cart-image-white" style="background-image: url(<?php echo base_url("assets/icons/cart_icon.png"); ?>);"></div>
            <div class="header-cart-image-black" style="background-image: url(<?php echo base_url("assets/icons/cart_icon_black.png"); ?>);"></div>
        </div>
    <?php } ?>
    <?php if (!$is_logged_in) { ?>
    <div class="header-register">
        <div class="header-login-text">
            <div class="header-login-text-login">LOGIN</div>
            <div class="login-box">
                <div class="form-item">
                    <div class="form-label">Email <span class="error error-login-email"></span></div>
                    <input type="text" class="form-input input-login-email" />
                </div>
                <div class="form-item">
                    <div class="form-label">Password <span class="error error-login-password"></span></div>
                    <input type="password" class="form-input input-login-password" />
                </div>
                <div class="remember-me-container">
                    <div class='checkbox-container remember-me-checkbox-container' data-name='remember-me' data-value='1'>
                        <div class='checkbox'></div>
                        <div class='checkbox-text'>Remember Me</div>
                    </div>
                    <a href="#" class="forgot-password">forgot password?</a>
                </div>
                <div class="button btn-login">Login</div>
                <div class="login-or">or</div>
                <div class="g-signin2" data-onsuccess="onSignIn" data-width="260" data-height="40" data-longtitle="true"></div>
            </div>
        </div>
        <a href="<?php echo base_url("register"); ?>" class="header-register-text">REGISTER</a>
    </div>
    <?php } else { ?>
        <a class="header-logout" href="<?php echo base_url("home/logout?redirect=" . rawurlencode((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])); ?>">Logout</a>
    <?php } ?>
    <div class="header-menu-icon">
        <div class="menu-icon-line menu-icon-line-1"></div>
        <div class="menu-icon-line menu-icon-line-2"></div>
        <div class="menu-icon-line menu-icon-line-3"></div>
    </div>
</div>
<?php if (!$hide_cart) { ?>
<div class="header-cart-mobile">
    <div class="header-cart-image-white" style="background-image: url(<?php echo base_url("assets/icons/cart_icon.png"); ?>);"></div>
    <div class="header-cart-image-black" style="background-image: url(<?php echo base_url("assets/icons/cart_icon_black.png"); ?>);"></div>
</div>
<?php } ?>
<div class="menu-mobile-container">
    <div class="menu-mobile-inner-container">
        <a href="<?php echo base_url(); ?>" class="header-menu-mobile<?php echo $header_menu["home"]; ?>" >HOME</a>
        <a href="<?php echo base_url("shop"); ?>" class="header-menu-mobile<?php echo $header_menu["shop"]; ?>" >SHOP</a>
        <a href="<?php echo base_url("about"); ?>" class="header-menu-mobile<?php echo $header_menu["about"]; ?>" >ABOUT</a>
        <a href="<?php echo base_url("contact-us"); ?>" class="header-menu-mobile<?php echo $header_menu["contact"]; ?>" >CONTACT US</a>
    </div>
    <?php if (!$is_logged_in) { ?>
    <div class="header-register-mobile">
        <a href="<?php echo base_url("register"); ?>" class="header-register-text-mobile">REGISTER</a>
        <a href="<?php echo base_url("login"); ?>" class="header-login-text-mobile">LOGIN</a>
        <div class="login-or-mobile">or</div>
        <div class="g-signin2" data-onsuccess="onSignIn" data-width="260" data-height="40" data-longtitle="true"></div>
    </div>
    <?php } else { ?>
        <a class="header-logout-mobile" href="<?php echo base_url("home/logout?redirect=" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">Logout</a>
    <?php } ?>
</div>
<?php if (!$hide_cart) { ?>
<div class="cart">
    <div class="cart-close-icon">
        <svg width="30" height="30" viewBox="0 0 50 50">
            <line x1="10" y1="25" x2="50" y2="25" stroke="black" stroke-width="1" />
            <line x1="50" y1="25" x2="30" y2="7" stroke="black" stroke-width="1" />
            <line x1="50" y1="25" x2="30" y2="43" stroke="black" stroke-width="1" />
        </svg>
    </div>
    <div class="cart-title">Your Cart <span class="cart-title-qty">(0 items)</span></div>
    <div class="cart-item-container">
        
    </div>
    <div class="cart-subtotal"><span class="cart-subtotal-text">SUBTOTAL : </span>Rp <span class="cart-subtotal-value">0</span>,-</div>
    <div class="button btn-cart-checkout disabled">CHECKOUT</div>
</div>
<?php } ?>
<div class="dark-background"></div>
<div class="dialog dialog-add-to-cart">
    <div class="dialog-background" data-allow-background-close="true">
        <div class="dialog-box">
            <div class="dialog-close-icon">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <line x1="0" y1="0" x2="20" y2="20" stroke="black" />
                    <line x1="20" y1="0" x2="0" y2="20" stroke="black" />
                </svg>
            </div>
            <div class="dialog-title">Add to Cart</div>
            <div class="dialog-content">
                <div class="dialog-content-left">
                    <div class="dialog-cart-image"></div>
                </div>
                <div class="dialog-content-right">
                    <div class="dialog-cart-name"></div>
                    <div class="dialog-cart-price"></div>
                    <div class="dialog-cart-qty">Qty</div>
                    <div class="dialog-cart-min-qty">-</div>
                    <input type="text" class="dialog-cart-input-qty" maxlength="5" value="1" />
                    <div class="dialog-cart-plus-qty">+</div>
                </div>
            </div>
            <div class="dialog-button-container">
                <div class="button dialog-btn-add-to-cart">Add to Cart</div>
            </div>
        </div>
    </div>
</div>
<script>
var login_url = "<?php echo base_url("home/do_login"); ?>";
var get_cart_url = "<?php echo base_url("home/get_cart"); ?>";
var add_to_cart_url = "<?php echo base_url("home/add_to_cart"); ?>";
var delete_from_cart_url = "<?php echo base_url("home/delete_from_cart"); ?>";
var checkout_url = "<?php echo base_url("checkout"); ?>";
var vw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
var vh = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
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

var signInOnce = false;
var alreadyLoggedIn = <?php echo ($is_logged_in) ? "true" : "false"; ?>;
var google_login_redirect = "";

function onSignIn(googleUser) {
    if (!signInOnce) {
        signInOnce = true;
        var profile = googleUser.getBasicProfile();
        var id_token = googleUser.getAuthResponse().id_token;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url("home/verify_google_id_token"); ?>');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            var result = jQuery.parseJSON(xhr.responseText);
            if (!alreadyLoggedIn) {
                if (result.status == "success") {
                    if (google_login_redirect == "") {
                        window.location.reload();
                    } else {
                        window.location = google_login_redirect;
                    }
                } else {
                    thisButton.removeClass("disabled");
                    showNotification(result.message);
                }
            }
        };
        xhr.send('idtoken=' + id_token + '&email=' + profile.getEmail() + '&name=' + profile.getName());
    }
}
</script>
<div class="container">