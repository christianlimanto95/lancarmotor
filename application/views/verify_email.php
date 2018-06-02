<div class="register-logo" style="background-image: url(<?php echo base_url("assets/icons/logo_with_text.png"); ?>);"></div>
<div class="section">
    <div class="center">
        <div class="thank-you-text"><?php echo ($valid) ? "Your account has been verified." : "This link has expired"; ?></div>
        <div class="button-container">
            <a href="<?php echo base_url("login"); ?>" class="button btn-go-to-login">Login</a>
            <a href="<?php echo base_url("shop"); ?>" class="button btn-back-to-shop">Back to Shop</a>
        </div>
    </div>
</div>