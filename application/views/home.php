<div class="preloader-background">
    <div class="preloader-splitter-left">
    </div>
    <div class="preloader-splitter-right">
        <div class="preloader">
            <div class="preloader-1"></div>
            <div class="preloader-2"></div>
            <div class="preloader-3"></div>
            <div class="preloader-4"></div>
            <div class="preloader-5"></div>
            <div class="preloader-6"></div>
            <div class="preloader-7">
                <svg width="104" height="104" viewBox="0 0 100 100">
                    <circle cx="50" cy="12" r="4" fill="white" />
                    <circle cx="77" cy="24" r="4" fill="white" />
                    <circle cx="88" cy="50" r="4" fill="white" />
                    <circle cx="77" cy="76" r="4" fill="white" />
                    <circle cx="23" cy="24" r="4" fill="white" />
                    <circle cx="50" cy="88" r="4" fill="white" />
                    <circle cx="23" cy="76" r="4" fill="white" />
                    <circle cx="12" cy="50" r="4" fill="white" />
                </svg>
            </div>
            <div class="preloader-8">
                <svg width="54" height="54" viewBox="0 0 100 100">
                    <circle cx="50" cy="12" r="4" fill="black" />
                    <circle cx="77" cy="24" r="4" fill="black" />
                    <circle cx="88" cy="50" r="4" fill="black" />
                    <circle cx="77" cy="76" r="4" fill="black" />
                    <circle cx="23" cy="24" r="4" fill="black" />
                    <circle cx="50" cy="88" r="4" fill="black" />
                    <circle cx="23" cy="76" r="4" fill="black" />
                    <circle cx="12" cy="50" r="4" fill="black" />
                </svg>
            </div>
            <div class="preloader-9"></div>
        </div>
        <div class="preloader-percentage">0%</div>
    </div>
</div>
<div class="section section-1">
    <div class="section-1-image" data-src="<?php echo base_url("assets/images/home.jpg"); ?>"></div>
    <div class="section-1-logo" style="background-image: url(<?php echo base_url("assets/icons/logo_with_text_white.png"); ?>);"></div>
</div>
<div class="section section-2">
    <div class="section-2-title" data-anim="show-up" data-anim-threshold="self">LANCAR MOTOR</div>
    <div class="section-2-description" data-anim="show-up" data-anim-threshold="self">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a nisl cursus, fermentum dolor vel, feugiat mauris. Integer accumsan tempor diam, vel eleifend leo bibendum ut. Donec massa lacus, interdum et ipsum sed, lacinia maximus nisi. Pellentesque et ligula ligula. Nullam urna ipsum, ultricies sed tincidunt in, posuere sit amet magna. Sed ornare pulvinar dolor ut dapibus. Aenean tristique purus vel tellus maximus cursus.</div>
</div>
<div class="section section-3">
    <div class="image-container section-3-image-container" data-parallax-image="true">
        <img class="section-3-image" src="<?php echo base_url("assets/images/home_2.jpg"); ?>" data-src="<?php echo base_url("assets/images/home_2.jpg"); ?>" />
    </div>
    <div class="section-3-right">
        <div class="section-3-subtitle" data-anim="true" data-anim-threshold="self">SPAREPARTS</div>
        <div class="section-3-description" data-anim="true" data-anim-threshold="self">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a nisl cursus, fermentum dolor vel, feugiat mauris. Integer accumsan tempor diam, vel eleifend leo bibendum ut. Donec massa lacus, interdum et ipsum sed, lacinia maximus nisi. Pellentesque et ligula ligula. Nullam urna ipsum, ultricies sed tincidunt in, posuere sit amet magna.</div>
    </div>
</div>
<div class="section section-4">
    <div class="subsection">
        <div class="subsection-title">TOP BRAND</div>
        <div class="subsection-item-container">
            <?php
            $iLength = sizeof($brands);
            for ($i = 0; $i < $iLength; $i++) {
                echo "<a href='" . base_url("shop?brand=" . $brands[$i]->brand_id) . "' class='subsection-item' data-anim='show-up' data-anim-threshold='self' data-src='" . base_url("assets/images/brands/brands_" . $brands[$i]->brand_id . "." . $brands[$i]->brand_image_extension . "?d=" . strtotime($brands[$i]->modified_date)) . "'></a>";
            }
            ?>
        </div>
    </div>
    <div class="subsection">
        <div class="subsection-title">TOP ITEM</div>
        <div class="subsection-item-container">
            <?php
            $iLength = sizeof($items);
            for ($i = 0; $i < $iLength; $i++) {
                $url_name = str_replace(" ", "-", str_replace("-", "", $items[$i]->item_name));
                $url = base_url("item-detail/" . $url_name . "-" . $items[$i]->item_id);
                echo "<div class='item' data-anim='show-up' data-anim-threshold='self'' data-id='" . $items[$i]->item_id . "' data-name='" . $items[$i]->item_name . "' data-price='" . $items[$i]->item_price . "' data-satuan='" . $items[$i]->item_satuan . "'>";
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
    <div class="subsection">
        <div class="subsection-title">CATEGORY</div>
        <div class="category-container">
            <?php
            $iLength = sizeof($categories);
            for ($i = 0; $i < $iLength; $i++) {
                echo "<a href='" . base_url("shop?category=" . $categories[$i]->category_id) . "' class='category-item' data-anim='show-up' data-anim-threshold='self'>" . $categories[$i]->category_name . "</a>";
            }
            ?>
        </div>
    </div>
    <div class="subsection">
        <div class="subsection-title">WORKSHOP</div>
        <div class="image-container workshop-image-container" data-parallax-image="true">
            <img class="workshop-image" src="<?php echo base_url("assets/images/home_2.jpg"); ?>" data-src="<?php echo base_url("assets/images/home_2.jpg"); ?>" />
        </div>
        <div class="workshop-right">
            <div class="workshop-right-title">GET TO KNOW US</div>
            <div class="workshop-right-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a nisl cursus, fermentum dolor vel, feugiat mauris. Integer accumsan tempor diam, vel eleifend leo bibendum ut. Donec massa lacus, interdum et ipsum sed, lacinia maximus nisi. Pellentesque et ligula ligula. Nullam urna ipsum, ultricies sed tincidunt in, posuere sit amet magna.</div>
        </div>
    </div>
</div>