<?php
global $api;
?>

<header>
    <a class="header-logo" href="?direct=home">SUCRÉ BAKERY</a>

    <div class="header-navigation">
        <a class="header-option" href="?direct=search">Tìm kiếm</a>

        <a class="header-option" href="?direct=product">Sản phẩm</a>

        <?php
        $us_info = $api->get_user_info();
        if (isset($us_info)) { ?>
            <a class="header-name" href="?direct=modify"><?php echo $us_info["us_name"]; ?></a>
        <?php } else { ?>
            <a class="header-option" href="?direct=login">Đăng nhập</a>
        <?php } ?>

        <a class="header-cart" href="?direct=cart">
            <p>Giỏ hàng</p>

            <?php
            if (isset($us_info)) {
                $total_quantity = $api->get_cart_total_quantity($us_info["us_id"]);
                if ($total_quantity > 0) { ?>
                    <div class="header-cart-total"><?php echo $total_quantity; ?></div>
                <?php }
            } ?>
        </a>
    </div>
</header>