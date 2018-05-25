<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/admindefault.css?v=14"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css?v=30"); ?>" />
	<?php echo $additional_css; ?>
	<style>
		@font-face {
			font-family: helvetica-thin-bold;
			src: url(<?php echo base_url("assets/fonts/HelveticaNeueLTPro-MdCn.woff"); ?>);
		}
	</style>
</head>
<body>
<div class="loader">
    <svg class="loader-circular">
        <circle class="loader-circular-path" cx="50" cy="50" r="30" fill="none" stroke-width="6" stroke-miterlimit="10"/>
    </svg>
</div>
<div class="menu-container">
	<div class="logo" style="background-image: url(<?php echo base_url("assets/icons/logo_white.png"); ?>);"></div>
	<a href="<?php echo base_url("admin"); ?>" class="menu<?php echo $menu_active["home"]; ?>">Home</a>
    <a href="<?php echo base_url("admin/master_satuan"); ?>" class="menu<?php echo $menu_active["master_satuan"]; ?>">Master Satuan</a>
    <a href="<?php echo base_url("admin/master_kategori"); ?>" class="menu<?php echo $menu_active["master_kategori"]; ?>">Master Kategori</a>
    <a href="<?php echo base_url("admin/master_brand"); ?>" class="menu<?php echo $menu_active["master_brand"]; ?>">Master Brand</a>
    <a href="<?php echo base_url("admin/master_barang"); ?>" class="menu<?php echo $menu_active["master_barang"]; ?>">Master Barang</a>
    <a href="<?php echo base_url("admin/konfirmasi_pembayaran"); ?>" class="menu<?php echo $menu_active["konfirmasi_pembayaran"]; ?>">Konfirmasi Pembayaran <span class="menu-notif-count">2</span></a>
    <a href="<?php echo base_url("admin/update_status_pesanan"); ?>" class="menu<?php echo $menu_active["update_status_pesanan"]; ?>">Update Status Pesanan <span class="menu-notif-count">3</span></a>
    <a href="<?php echo base_url("admin/laporan"); ?>" class="menu<?php echo $menu_active["laporan"]; ?>">Laporan</a>
</div>
<div class="header">
	<div class="menu-title"><?php echo $menu_title; ?></div>
    <div class="admin-menu-icon" style="background-image: url(<?php echo base_url("assets/icons/profile.png"); ?>);"></div>
    <div class="admin-menu-container">
        <a href="<?php echo base_url("admin/settings"); ?>" class="admin-menu" >Settings</a>
        <a href="<?php echo base_url("admin_login/logout"); ?>" class="admin-menu" >Logout</a>
    </div>
</div>
<div class="notification"></div>
<div class="container">
<?php 
    if ($this->session->userdata("success_message")) {
        echo "<div class='success-message'>" . $this->session->userdata("success_message") . "</div>";
    }
    if ($this->session->userdata("error_message")) {
        echo "<div class='error-message'>" . $this->session->userdata("error_message") . "</div>";
    }
?>