<div class="register-logo" style="background-image: url(<?php echo base_url("assets/icons/logo_with_text.png"); ?>);"></div>
<a class="register-redirect" href="<?php echo base_url("register"); ?>">Don't have an account? Register Here!</a>
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
                <div class="form-item">
                    <div class="form-label">Email <span class="error error-email"></span></div>
                    <input type="text" class="form-input input-email" autofocus />
                </div>
                <div class="form-item">
                    <div class="form-label">Password <span class="error error-password"></span></div>
                    <input type="password" class="form-input input-password" />
                </div>
                <div class="login-remember-me">
                    <div class='checkbox-container login-remember-me-checkbox-container' data-name='login-remember-me' data-value='1'>
                        <div class='checkbox'></div>
                        <div class='checkbox-text'>Remember Me</div>
                    </div>
                    <a href="#" class="forgot-password">forgot password?</a>
                </div>
                <div class="button btn-login">Login</div>
            </div>
        </div>
    </div>
</div>