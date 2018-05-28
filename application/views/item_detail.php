<div class="section">
    <div class="center">
        <div class="section-filter fixed">
            <div class="filter-title">Filter Search</div>
            <div class="filter-content">
                <div class="filter-close-icon">
                    <svg width="30" height="30" viewBox="0 0 50 50">
                        <line x1="10" y1="25" x2="50" y2="25" stroke="black" stroke-width="2" />
                        <line x1="10" y1="25" x2="30" y2="7" stroke="black" stroke-width="2" />
                        <line x1="10" y1="25" x2="30" y2="43" stroke="black" stroke-width="2" />
                    </svg>
                    <div class="filter-close-text">Close Filter</div>
                </div>
                <div class="filter-item">
                    <div class="filter-label">NAME</div>
                    <input type="text" class="filter-input" />
                </div>
                <div class="filter-item">
                    <div class="filter-label">BRAND</div>
                    <div class="checkbox-outer-container">
                        <?php
                        $iLength = (sizeof($brands) >= 5) ? 5 : sizeof($brands);
                        for ($i = 0; $i < $iLength; $i++) {
                            echo "
                            <div class='checkbox-container brand-checkbox-container' data-name='brand' data-value='" . $brands[$i]->brand_id . "'>
                                <div class='checkbox'></div>
                                <div class='checkbox-text'>" . $brands[$i]->brand_name . "</div>
                            </div>";
                        }
                        ?>
                    </div>
                    <div class="more more-brands">More Brands...</div>
                </div>
                <div class="filter-item">
                    <div class="filter-label">CATEGORY</div>
                    <div class="checkbox-outer-container">
                        <?php
                        $iLength = (sizeof($categories) >= 5) ? 5 : sizeof($categories);
                        for ($i = 0; $i < $iLength; $i++) {
                            echo "
                            <div class='checkbox-container category-checkbox-container' data-name='category' data-value='" . $categories[$i]->category_id . "'>
                                <div class='checkbox'></div>
                                <div class='checkbox-text'>" . $categories[$i]->category_name . "</div>
                            </div>";
                        }
                        ?>
                    </div>
                    <div class="more more-category">More Category...</div>
                </div>
            </div>
        </div>
        <div class="section-result">
            <a class="breadcrumb" href="<?php echo base_url("shop"); ?>">< Return to Shop</a>
            <div class="detail-item">DETAIL <strong>ITEM</strong></div>
            <div class="detail-item-container">
                <div class="image-container item-image-container">
                    <img class="item-image" src="<?php echo base_url("assets/images/item/item_" . $data->item_id . "." . $data->item_image_extension . "?d=" . strtotime($data->modified_date)); ?>" data-src="<?php echo base_url("assets/images/item/item_" . $data->item_id . "." . $data->item_image_extension . "?d=" . strtotime($data->modified_date)); ?>" />
                </div>
                <div class="text-container">
                    <div class="detail-item-title"><?php echo $data->item_name; ?></div>
                    <div class="detail-item-price">Rp <?php echo number_format($data->item_price, 0, ",", "."); ?>,-</div>
                    <div class="item-quantity">
                        <div class="quantity-label">Quantity</div>
                        <div class="btn-qty btn-qty-minus">
                            <div class="btn-qty-text">-</div>
                        </div>
                        <input type="number" class="input-qty" min="1" max="999" value="1" />
                        <div class="btn-qty btn-qty-plus">
                            <div class="btn-qty-text">+</div>
                        </div>
                    </div>
                    <div class="button btn-add-to-cart">ADD TO CART</div>
                    <div class="button btn-buy-now">BUY NOW</div>
                    <div class="detail-item-description">
                        <pre><?php echo $data->item_description; ?></pre>
                    </div>
                    <div class="spec">
                        <div class="spec-label">Dimensions : </div>
                        <div class="spec-value"><?php echo $data->item_panjang . " " . $data->item_dimensi_satuan . " x " . $data->item_lebar . " " . $data->item_dimensi_satuan . " x " . $data->item_tinggi . " " . $data->item_dimensi_satuan ?></div>
                    </div>
                    <div class="spec">
                        <div class="spec-label">Weight : </div>
                        <div class="spec-value"><?php echo $data->item_berat . " " . $data->item_berat_satuan; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog dialog-brand">
    <div class="dialog-background" data-allow-background-close="true">
        <div class="dialog-box">
            <div class="dialog-close-icon">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <line x1="0" y1="0" x2="20" y2="20" stroke="black" />
                    <line x1="20" y1="0" x2="0" y2="20" stroke="black" />
                </svg>
            </div>
            <div class="dialog-title">BRAND</div>
            <div class="dialog-content">
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='0'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>ALL</div>
                </div>
                <?php
                $iLength = sizeof($brands);
                for ($i = 0; $i < $iLength; $i++) {
                    echo "
                    <div class='checkbox-container dialog-brand-checkbox-container' data-name='dialog-brand' data-value='" . $brands[$i]->brand_id . "'>
                        <div class='checkbox'></div>
                        <div class='checkbox-text'>" . $brands[$i]->brand_name . "</div>
                    </div>
                    ";
                }
                ?>
            </div>
            <div class="dialog-button-container">
                <div class="button dialog-button">Done</div>
            </div>
        </div>
    </div>
</div>
<div class="dialog dialog-category">
    <div class="dialog-background" data-allow-background-close="true">
        <div class="dialog-box">
            <div class="dialog-close-icon">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <line x1="0" y1="0" x2="20" y2="20" stroke="black" />
                    <line x1="20" y1="0" x2="0" y2="20" stroke="black" />
                </svg>
            </div>
            <div class="dialog-title">CATEGORY</div>
            <div class="dialog-content">
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='0'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>ALL</div>
                </div>
                <?php
                $iLength = sizeof($categories);
                for ($i = 0; $i < $iLength; $i++) {
                    echo "
                    <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='" . $categories[$i]->category_id . "'>
                        <div class='checkbox'></div>
                        <div class='checkbox-text'>" . $categories[$i]->category_name . "</div>
                    </div>
                    ";
                }
                ?>
            </div>
            <div class="dialog-button-container">
                <div class="button dialog-button">Done</div>
            </div>
        </div>
    </div>
</div>