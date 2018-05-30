<div class="chosen-brand" data-value="<?php echo $query_brand; ?>"></div>
<div class="chosen-category" data-value="<?php echo $query_category; ?>"></div>
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
                    <input type="text" class="filter-input input-name" value="<?php echo $query_keyword; ?>" />
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
            <div class="search-result-text"></div>
            <div class="shop-title">SHOP</div>
            <div class="item-container">
                <?php
                $iLength = sizeof($items);
                for ($i = 0; $i < $iLength; $i++) {
                    $url_name = str_replace(" ", "-", str_replace("-", "", $items[$i]->item_name));
                    $url = base_url("item-detail/" . $url_name . "-" . $items[$i]->item_id);
                    echo "<div class='item' data-id='" . $items[$i]->item_id . "' data-name='" . $items[$i]->item_name . "' data-price='" . $items[$i]->item_price . "' data-satuan='" . $items[$i]->item_satuan . "'>";
                    echo "<a href='" . $url . "' class='item-image' data-src='" . base_url("assets/images/item/item_" . $items[$i]->item_id . "." . $items[$i]->item_image_extension . "?d=" . strtotime($items[$i]->modified_date)) . "'></a>";
                    echo "<div class='item-name'>" . $items[$i]->item_name . "</div>";
                    echo "<div class='item-price'>Rp " . number_format($items[$i]->item_price, 0, ", ", ".") . ",-</div>";
                    echo "<div class='item-button-container'>";
                    echo "<div class='button item-button btn-add-to-cart'>";
                    echo "<div class='button-text'>Add to Cart</div>";
                    echo "</div>";
                    echo "<div class='button item-button btn-buy-now'>";
                    echo "<div class='button-text'>Buy Now</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
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
                <div class='checkbox-container dialog-brand-checkbox-container' data-name='dialog-brand' data-value='0'>
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
<script>
var image_url = "<?php echo base_url("assets/images/item/"); ?>";
var get_item_url = "<?php echo base_url("shop/get_item_query"); ?>";
</script>