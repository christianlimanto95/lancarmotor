<div class="section">
    <div class="section-right">
        <div class="shipping-cart-item-container">
            <?php
            $iLength = sizeof($data);
            for ($i = 0; $i < $iLength; $i++) {
                echo "
                <div class='shipping-cart-item'>
                    <div class='shipping-cart-item-delete'>
                        <svg width='13' height='13' viewBox='0 0 13 13'>
                            <line x1='0' y1='0' x2='13' y2='13' stroke='black' />
                            <line x1='13' y1='0' x2='0' y2='13' stroke='black' />
                        </svg>
                    </div>
                    <div class='shipping-cart-image' data-src='" . base_url("assets/images/item/item_" . $data[$i]->item_id . "." . $data[$i]->item_image_extension . "?d=" . strtotime($data[$i]->modified_date)) . "'></div>
                    <div class='shipping-cart-text'>
                        <div class='shipping-cart-name'>" . $data[$i]->item_name . "</div>
                        <div class='shipping-cart-price'>Rp " . number_format($data[$i]->item_price, 0, ",", ".") . ",-</div>
                        <div class='shipping-cart-qty'>Qty : " . $data[$i]->item_qty . "</div>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
        <div class="subtotal">
            <div class="subtotal-label">Subtotal</div>
            <div class="subtotal-value">Rp <?php echo ($iLength > 0) ? number_format($data[0]->hcart_total_price, 0, ",", ".") : "0"; ?>,-</div>
        </div>
        <div class="shipping">
            <div class="shipping-label">Shipping</div>
            <div class="subtotal-value">Rp 0,-</div>
        </div>
        <div class="total">
            <div class="total-label">Total</div>
            <div class="total-value">Rp <?php echo ($iLength > 0) ? number_format($data[0]->hcart_total_price, 0, ",", ".") : "0"; ?>,-</div>
        </div>
    </div>
    <div class="section-left">
        <div class="section-title"><strong>SHIPPING</strong> INFORMATION</div>
        <div class="form-container">
            <div class="form-item">
                <div class="form-label">Name <span class="error error-shipping-name"></span></div>
                <input type="text" class="form-input input-shipping-name" />
            </div>
            <div class="form-item">
                <div class="form-label">Address <span class="error error-shipping-address"></span></div>
                <textarea class="form-input input-shipping-address" ></textarea>
            </div>
            <div class="form-item">
                <div class="form-label">City <span class="error error-shipping-city"></span></div>
                <input type="text" class="form-input input-shipping-city" />
            </div>
            <div class="form-item">
                <div class="form-label">Phone Number <span class="error error-shipping-phone"></span></div>
                <input type="text" class="form-input input-shipping-phone" data-type="number" maxlength="20" />
            </div>
            <div class="button btn-confirm-order">Confirm Order</div>
            <a href="<?php echo base_url("shop"); ?>" class="return-to-shop" >< Return to Shop</a>
        </div>
    </div>
</div>
<script>
var payment_url = "<?php echo base_url("checkout/payment"); ?>";
</script>