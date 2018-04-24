<html>
<head>
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css"); ?>" />
	<?php echo $additional_css; ?>
</head>
<body>
<div class="header">
    <div class="logo"></div>
    <div class="header-menu-container">
        <a href="#" class="header-menu active" >
            <div class="header-menu-text">HOME</div>
            <div class="header-menu-line"></div>
        </a>
        <a href="#" class="header-menu" >
            <div class="header-menu-text">SHOP</div>
            <div class="header-menu-line"></div>
        </a>
        <a href="#" class="header-menu" >
            <div class="header-menu-text">ABOUT</div>
            <div class="header-menu-line"></div>
        </a>
        <a href="#" class="header-menu" >
            <div class="header-menu-text">CONTACT US</div>
            <div class="header-menu-line"></div>
        </a>
    </div>
    <div class="header-search"></div>
    <div class="header-cart"></div>
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