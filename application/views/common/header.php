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
    
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css?v=5"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css?v=6"); ?>" />
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
<body>
<div class="header<?php echo $header_additional_class; ?>">
    <a href="<?php echo base_url(); ?>" class="logo" style="background-image: url(<?php echo base_url("assets/icons/logo_white.png"); ?>);"></a>
    <div class="header-menu-container">
        <a href="<?php echo base_url(); ?>" class="header-menu<?php echo $header_menu["home"]; ?>" >HOME</a>
        <a href="<?php echo base_url("shop"); ?>" class="header-menu<?php echo $header_menu["shop"]; ?>" >SHOP</a>
        <a href="<?php echo base_url("about"); ?>" class="header-menu<?php echo $header_menu["about"]; ?>" >ABOUT</a>
        <a href="#" class="header-menu<?php echo $header_menu["contact"]; ?>" >CONTACT US</a>
    </div>
    <div class="header-search" style="background-image: url(<?php echo base_url("assets/icons/search_icon.png"); ?>);"></div>
    <div class="header-cart" style="background-image: url(<?php echo base_url("assets/icons/cart_icon.png"); ?>);"></div>
    <div class="header-register">
        <div class="header-login-text">
            LOGIN
            <div class="login-box">
                <div class="form-item">
                    <div class="form-label">Email</div>
                    <input type="text" class="form-input input-login-email" />
                </div>
                <div class="form-item">
                    <div class="form-label">Password</div>
                    <input type="password" class="form-input" />
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
                <div class="btn-login-with-google">
                    <div class="google-icon" style="background-image: url(<?php echo base_url("assets/icons/google_g.png"); ?>);"></div>
                    <div class="login-with-google-text">Masuk dengan Google</div>
                </div>
            </div>
        </div>
        <a href="<?php echo base_url("register"); ?>" class="header-register-text">REGISTER</a>
    </div>
</div>
<div class="cart">
    <div class="cart-close-icon">
        <svg width="30" height="30" viewBox="0 0 50 50">
            <line x1="10" y1="25" x2="50" y2="25" stroke="black" stroke-width="1" />
            <line x1="50" y1="25" x2="30" y2="7" stroke="black" stroke-width="1" />
            <line x1="50" y1="25" x2="30" y2="43" stroke="black" stroke-width="1" />
        </svg>
    </div>
    <div class="cart-title">Your Cart</div>
    <div class="cart-item-container">
        <div class="cart-item">
            <div class="cart-item-delete">
                <svg width="13" height="13" viewBox="0 0 13 13">
                    <line x1="0" y1="0" x2="13" y2="13" stroke="black" />
                    <line x1="13" y1="0" x2="0" y2="13" stroke="black" />
                </svg>
            </div>
            <div class="cart-item-image" data-src="<?php echo base_url("assets/images/775563_x800.jpg"); ?>"></div>
            <div class="cart-item-text">
                <div class="cart-item-nama">NGK Busi</div>
                <div class="cart-item-harga">Rp 57.000,-</div>
                <div class="cart-item-qty">Qty : 3</div>
            </div>
        </div>
        <div class="cart-item">
            <div class="cart-item-delete">
                <svg width="13" height="13" viewBox="0 0 13 13">
                    <line x1="0" y1="0" x2="13" y2="13" stroke="black" />
                    <line x1="13" y1="0" x2="0" y2="13" stroke="black" />
                </svg>
            </div>
            <div class="cart-item-image" data-src="<?php echo base_url("assets/images/775563_x800.jpg"); ?>"></div>
            <div class="cart-item-text">
                <div class="cart-item-nama">NGK Busi</div>
                <div class="cart-item-harga">Rp 57.000,-</div>
                <div class="cart-item-qty">Qty : 3</div>
            </div>
        </div>
    </div>
    <div class="cart-subtotal"><span class="cart-subtotal-text">SUBTOTAL : </span>Rp 93.000,-</div>
    <div class="button btn-cart-checkout">CHECKOUT</div>
</div>
<div class="dark-background"></div>
<script>
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
</script>
<div class="container">