<html>
<head>
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css?v=1"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css?v=1"); ?>" />
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