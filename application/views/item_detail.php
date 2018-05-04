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
                        <div class='checkbox-container brand-checkbox-container' data-name='brand' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>BRAND 1</div>
                        </div>
                        <div class='checkbox-container brand-checkbox-container' data-name='brand' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>BRAND 2</div>
                        </div>
                        <div class='checkbox-container brand-checkbox-container' data-name='brand' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>BRAND 3</div>
                        </div>
                        <div class='checkbox-container brand-checkbox-container' data-name='brand' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>BRAND 4</div>
                        </div>
                        <div class='checkbox-container brand-checkbox-container' data-name='brand' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>BRAND 5</div>
                        </div>
                    </div>
                    <div class="more more-brands">More Brands...</div>
                </div>
                <div class="filter-item">
                    <div class="filter-label">CATEGORY</div>
                    <div class="checkbox-outer-container">
                        <div class='checkbox-container category-checkbox-container' data-name='category' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>CATEGORY 1</div>
                        </div>
                        <div class='checkbox-container category-checkbox-container' data-name='category' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>CATEGORY 2</div>
                        </div>
                        <div class='checkbox-container category-checkbox-container' data-name='category' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>CATEGORY 3</div>
                        </div>
                        <div class='checkbox-container category-checkbox-container' data-name='category' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>CATEGORY 4</div>
                        </div>
                        <div class='checkbox-container category-checkbox-container' data-name='category' data-value='1'>
                            <div class='checkbox'></div>
                            <div class='checkbox-text'>CATEGORY 5</div>
                        </div>
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
                    <img class="item-image" src="<?php echo base_url("assets/images/775563_x800.jpg"); ?>" data-src="<?php echo base_url("assets/images/775563_x800.jpg"); ?>" />
                </div>
                <div class="text-container">
                    <div class="detail-item-title">NGK BUSI</div>
                    <div class="detail-item-price">Rp 18.000,-</div>
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
                        <pre>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat ullamcorper nunc non faucibus. Fusce luctus, nulla eget sagittis pellentesque, eros leo lacinia ipsum, nec tincidunt ante purus eget dolor. Sed eget pulvinar neque. Nulla laoreet neque quis mauris pellentesque sodales. Morbi tincidunt tempor velit, ut fringilla leo euismod a. Aenean fringilla, ligula id tincidunt mollis, magna libero sollicitudin erat, non bibendum purus magna id massa. Fusce eleifend orci eros, ac malesuada tortor semper in. Sed varius elit eu congue hendrerit. Aliquam aliquet, dolor in pretium semper, nulla mauris dignissim sapien, at egestas augue elit ut justo. Donec egestas ex at turpis porta commodo. Etiam accumsan tortor commodo tellus rutrum interdum. Morbi placerat at augue et interdum.</pre>
                    </div>
                    <div class="spec">
                        <div class="spec-label">Dimensions : </div>
                        <div class="spec-value">10 cm x 10 cm x 2 cm</div>
                    </div>
                    <div class="spec">
                        <div class="spec-label">Weight : </div>
                        <div class="spec-value">< 1 kg</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog dialog-category">
    <div class="dialog-background">
        <div class="dialog-box">
            <div class="dialog-close-icon">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <line x1="0" y1="0" x2="20" y2="20" stroke="black" />
                    <line x1="20" y1="0" x2="0" y2="20" stroke="black" />
                </svg>
            </div>
            <div class="dialog-title">CATEGORY</div>
            <div class="dialog-content">
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>ALL</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
                <div class='checkbox-container dialog-category-checkbox-container' data-name='dialog-category' data-value='1'>
                    <div class='checkbox'></div>
                    <div class='checkbox-text'>CATEGORY 1</div>
                </div>
            </div>
            <div class="dialog-button-container">
                <div class="button dialog-button">Done</div>
            </div>
        </div>
    </div>
</div>