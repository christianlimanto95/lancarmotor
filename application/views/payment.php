<div class="section">
    <div class="section-right">
        <div class="shipping-cart-item-container">
            <?php
            $iLength = sizeof($data);
            for ($i = 0; $i < $iLength; $i++) {
                echo "
                <div class='shipping-cart-item'>
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
        <div class="section-title"><strong>PAYMENT</strong></div>
        <div class="section-left-detail">
            <div class="order-code">ORDER CODE : MGT12131</div>
            <div class="bank-item">
                <pre>Bank Transfer : 

BCA - Zico Wibowo
0292 2010 331

Mandiri - Zico Wibowo
2012 2313 212
                </pre>
            </div>
            <div class="transfer-description">
                <pre>

Silakan transfer ke salah satu rekening di atas sesuai dengan total belanjaan Anda, dan melakukan konfirmasi pembayaran dengan menyertakan keterangan kode pemesanan Anda agar dapat mempermudah proses pembayaran Anda.</pre>
            </div>
            <div class="upload-container btn btn-insert-image">
                <input type="hidden" />
                <div class="upload-button">
                    <div class="upload-text">Browse File...</div>
                </div>
                <input type="file" class="input-upload" name="input-image" accept="image/*" />
            </div>
            <div class="image-preview-container">
                <div class="btn-delete-image-preview">Remove</div>
                <img class="image-preview" />
            </div>
            <div class="button btn-confirm-payment">Confirm Payment</div>
            <a href="<?php echo base_url("shop"); ?>" class="return-to-shop" >< Return to Shop</a>
        </div>
    </div>
</div>