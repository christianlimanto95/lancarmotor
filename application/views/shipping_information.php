<div class="section">
    <div class="section-left">
        <div class="section-title"><strong>SHIPPING</strong> INFORMATION</div>
        <div class="form-container">
            <div class="form-item">
                <div class="form-label">Name</div>
                <input type="text" class="form-input" />
            </div>
            <div class="form-item">
                <div class="form-label">Address</div>
                <input type="text" class="form-input" />
            </div>
            <div class="form-item">
                <div class="form-label">City</div>
                <input type="text" class="form-input" />
            </div>
            <div class="form-item">
                <div class="form-label">Phone Number</div>
                <input type="text" class="form-input" data-type="number" />
            </div>
            <div class="button btn-confirm-order">Confirm Order</div>
            <a href="<?php echo base_url("shop"); ?>" class="return-to-shop" >< Return to Shop</a>
        </div>
    </div>
    <div class="section-right">
        <div class="shipping-cart-item-container">
            <div class="shipping-cart-item">
                <div class="shipping-cart-item-delete">
                    <svg width="13" height="13" viewBox="0 0 13 13">
                        <line x1="0" y1="0" x2="13" y2="13" stroke="black" />
                        <line x1="13" y1="0" x2="0" y2="13" stroke="black" />
                    </svg>
                </div>
                <div class="shipping-cart-image" data-src="<?php echo base_url("assets/images/busi.png"); ?>"></div>
                <div class="shipping-cart-text">
                    <div class="shipping-cart-name">NGK Busi</div>
                    <div class="shipping-cart-price">Rp 57.000,-</div>
                    <div class="shipping-cart-qty">Qty : 2</div>
                </div>
            </div>
            <div class="shipping-cart-item">
                <div class="shipping-cart-item-delete">
                    <svg width="13" height="13" viewBox="0 0 13 13">
                        <line x1="0" y1="0" x2="13" y2="13" stroke="black" />
                        <line x1="13" y1="0" x2="0" y2="13" stroke="black" />
                    </svg>
                </div>
                <div class="shipping-cart-image" data-src="<?php echo base_url("assets/images/busi.png"); ?>"></div>
                <div class="shipping-cart-text">
                    <div class="shipping-cart-name">NGK Busi</div>
                    <div class="shipping-cart-price">Rp 57.000,-</div>
                    <div class="shipping-cart-qty">Qty : 2</div>
                </div>
            </div>
        </div>
        <div class="subtotal">
            <div class="subtotal-label">Subtotal</div>
            <div class="subtotal-value">Rp 93.000,-</div>
        </div>
        <div class="shipping">
            <div class="shipping-label">Shipping</div>
            <div class="subtotal-value">Rp 20.000,-</div>
        </div>
        <div class="total">
            <div class="total-label">Total</div>
            <div class="total-value">Rp 113.000,-</div>
        </div>
    </div>
</div>
<script>
var payment_url = "<?php echo base_url("checkout/payment"); ?>";
</script>