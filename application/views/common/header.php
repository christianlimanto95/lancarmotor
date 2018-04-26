<html>
<head>
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css?v=3"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css?v=2"); ?>" />
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
    <div class="logo" style="background-image: url(<?php echo base_url("assets/icons/logo_white.png"); ?>);"></div>
    <div class="header-menu-container">
        <a href="<?php echo base_url(); ?>" class="header-menu<?php echo $header_menu["home"]; ?>" >HOME</a>
        <a href="<?php echo base_url("shop"); ?>" class="header-menu<?php echo $header_menu["shop"]; ?>" >SHOP</a>
        <a href="#" class="header-menu<?php echo $header_menu["about"]; ?>" >ABOUT</a>
        <a href="#" class="header-menu<?php echo $header_menu["contact"]; ?>" >CONTACT US</a>
    </div>
    <div class="header-search" style="background-image: url(<?php echo base_url("assets/icons/search_icon.png"); ?>);"></div>
    <div class="header-cart" style="background-image: url(<?php echo base_url("assets/icons/cart_icon.png"); ?>);"></div>
    <div class="header-register">
        <div class="header-login-text">LOGIN</div>
        <div class="header-register-text">REGISTER</div>
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