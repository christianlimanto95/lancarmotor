<html>
<head>
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css"); ?>" />
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
        <a href="#" class="header-menu active" >HOME</a>
        <a href="#" class="header-menu" >SHOP</a>
        <a href="#" class="header-menu" >ABOUT</a>
        <a href="#" class="header-menu" >CONTACT US</a>
    </div>
    <div class="header-search" style="background-image: url(<?php echo base_url("assets/icons/search_icon.png"); ?>);"></div>
    <div class="header-cart" style="background-image: url(<?php echo base_url("assets/icons/cart_icon.png"); ?>);"></div>
    <div class="header-register">
        <div class="header-login-text">LOGIN</div>
        <div class="header-register-text">REGISTER</div>
    </div>
</div>
<script>
var vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
var vh = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
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