<div class="register-logo" style="background-image: url(<?php echo base_url("assets/icons/logo_with_text.png"); ?>);"></div>
<a class="login-redirect" href="<?php echo base_url("login"); ?>">Already have an account? Login Here!</a>
<div class="section">
    <div class="center">
        <div class="section-left">
            <div class="g-signin2 register-with-google" data-onsuccess="onSignIn" data-width="260" data-height="50" data-longtitle="true"></div>
        </div>
        <div class="section-or">
            <div class="section-or-line"></div>
            <div class="or-text">or</div>
        </div>
        <div class="section-right">
            <div class="register-box">
                <div class="register-box-title">Register Account</div>
                <div class="form-item">
                    <div class="form-label">Name <span class="error error-register-name"></span></div>
                    <input type="text" class="form-input input-register-name" maxlength="50" autofocus />
                </div>
                <div class="form-item">
                    <div class="form-label">Phone Number <span class="error error-register-phone"></span></div>
                    <input type="text" class="form-input input-register-phone" maxlength="20" />
                </div>
                <div class="form-item">
                    <div class="form-label">Email <span class="error error-register-email"></span></div>
                    <input type="text" class="form-input input-register-email" maxlength="50" />
                </div>
                <div class="form-item">
                    <div class="form-label">Password <span class="error error-register-password"></span></div>
                    <input type="password" class="form-input input-register-password" maxlength="50" />
                </div>
                <div class="button btn-register">Register</div>
            </div>
        </div>
    </div>
</div>
<script>
var do_register_url = "<?php echo base_url("register/do_register"); ?>";
var thank_you_url = "<?php echo base_url("register/thank_you"); ?>";
google_login_redirect = "<?php echo base_url("shop"); ?>";
</script>